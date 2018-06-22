<?php
session_start();
if(!isset($_SESSION['signed_in']))
{
    include "chyba_prihlasenia.php";
}
else
{
    $titulok="Úprava profilu";
    include "html_hlavicka.php";
    require "db_pripojenie.php";
if (isset($_POST['ulozit_zmeny'])){
    
    $id = $_SESSION['pk_uzivatel'];

    $sql = "SELECT 
        heslo
    FROM
        tb_uzivatel
    WHERE
        pk_uzivatel ='$id'";

    $uzivatel = mysqli_query($db_spojenie, $sql);
    if(!mysqli_num_rows($uzivatel) == 1) 
    {
        echo 'Chyba, skús sa odhlásiť a prihlásiť.'; //ak sa nenasla ziadna zhoda v databaze
    }
    else
    {
        $password = $_POST['heslo_z'];
        $riadok_uzivatel = mysqli_fetch_array($uzivatel);
        $hashed_password = $riadok_uzivatel['heslo'];
        if(password_verify($password, $hashed_password) == true){    

    $meno = $_POST['meno_n'];       
    $priezvisko = $_POST['priezvisko_n'];
    $pohlavie = $_POST['pohlavie_n'];
    $adresa = $_POST['adresa_n'];
    $telefon = $_POST['telefon_n'];  
    $mesto_n = $_POST['mesto_n'];
    $psc_n = $_POST['psc_n'];

    if(strlen($psc_n) > 5){
        echo "PSČ nesmie mať viac ako 5 čísel!";
    }else{

        //vyberie mesta z tabulky zhodujuce sa so vstupom
    $sql_list_mesta = "SELECT 
        pk_mesto,
        mesto,
        psc
    FROM
        tb_mesto
    WHERE
        mesto ='$mesto_n'
    AND psc='$psc_n'";
     
$vysledok_list_mesta = mysqli_query($db_spojenie, $sql_list_mesta);

if(!$vysledok_list_mesta)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
if(mysqli_num_rows($vysledok_list_mesta) == 0) 
{

//ak sa nenašlo mesto s rovnakym nazvom a PSČ tak vloží nové mesto do tb_mesto

    $sql_vloz_mesto = "INSERT INTO
        tb_mesto
        (mesto, psc)
    VALUES
        ('$mesto_n', '$psc_n')";

    $registruj_mesto = mysqli_query($db_spojenie, $sql_vloz_mesto);

    if (!$registruj_mesto) {
        die ('Chyba zaslania príkazu SQL, pri vložení mesta do tabuľky.'  . mysqli_error($db_spojenie));
    }
    $vysledok_mesta = mysqli_query($db_spojenie, $sql_list_mesta);

    $riadok_mesto = mysqli_fetch_array($vysledok_mesta);

    $fk_mesto = $riadok_mesto['pk_mesto']; //ziska id mesta ktore zapise do tb_osoba


    $sql_update_udaje = "UPDATE
    tb_osoba
    SET 
    meno = '$meno', priezvisko='$priezvisko', pohlavie='$pohlavie', adresa='$adresa', telefon='$telefon', fk_mesto='$fk_mesto'
    WHERE
    pk_osoba = '$id'";
    
    $uprav_udaje = mysqli_query($db_spojenie, $sql_update_udaje);
    
}
else
{
    $vysledok_mesta = mysqli_query($db_spojenie, $sql_list_mesta);

    $riadok_mesto = mysqli_fetch_array($vysledok_mesta);

    $fk_mesto = $riadok_mesto['pk_mesto'];


    $sql_update_udaje = "UPDATE
    tb_osoba
    SET 
    meno = '$meno', priezvisko='$priezvisko', pohlavie='$pohlavie',  adresa='$adresa', telefon='$telefon', fk_mesto='$fk_mesto'
    WHERE
    pk_osoba = '$id'";
    
    $uprav_udaje = mysqli_query($db_spojenie, $sql_update_udaje);

}

if(!$uprav_udaje)
    {
        echo "Nepodarilo sa upraviť údaje v databáze!";
    }
    $sql_udaje = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,fk_mesto FROM tb_osoba WHERE pk_osoba='$id'");
    $osobne_udaje = mysqli_fetch_array($sql_udaje);
    $pk_mesto = $osobne_udaje['fk_mesto'];
    
    $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
    $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

    //prevzatie udajov o pouzivatelovi z databazy a ulozenie do session
    $_SESSION['meno'] = $osobne_udaje['meno'];
    $_SESSION['priezvisko'] = $osobne_udaje['priezvisko'];
    $_SESSION['pohlavie'] = $osobne_udaje['pohlavie'];
    $_SESSION['adresa'] = $osobne_udaje['adresa'];
    $_SESSION['telefon'] = $osobne_udaje['telefon'];
    $_SESSION['mesto'] = $riadok_mesto['mesto'];
    $_SESSION['psc'] = $riadok_mesto['psc'];
    header('Location: profil.php');
   // echo '<script> location.replace("profil.php"); </script>';

    
}

}else
    echo "Heslo sa nezhoduje!";
}

}
require "form_profil.php";
}
include "html_pata.php";
?>