<?php
session_start();
$titulok="Úprava profilu";
include "html_hlavicka.php";
include "body_start.php";

require "db_pripojenie.php";        
require "form_profil.php";

if (isset($_POST['ok'])){
    $id = $_SESSION['pk_uzivatel'];

    $meno = $_POST['meno_n'];         //*
    $priezvisko = $_POST['priezvisko_n'];//*
    $pohlavie = $_POST['pohlavie_n'];
    $adresa = $_POST['adresa_n'];
    $telefon = $_POST['telefon_n'];
    $email = $_POST['email_n'];       //*
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
    $vysledok_list_mesta = mysqli_query($db_spojenie, $sql_list_mesta);

    $riadok_mesto = mysqli_fetch_array($vysledok_list_mesta);

    $fk_mesto = $riadok_mesto['pk_mesto']; //ziska id mesta ktore zapise do tb_osoba


    $sql_update_udaje = "UPDATE
    tb_osoba
    SET 
    meno = '$meno', priezvisko='$priezvisko', pohlavie='$pohlavie', adresa='$adresa', telefon='$telefon', email='$email', fk_mesto='$fk_mesto'
    WHERE
    pk_osoba = '$id'";
    
    $uprav_udaje = mysqli_query($db_spojenie, $sql_update_udaje);
    
}
else
{
    $vysledok_list_mesta = mysqli_query($db_spojenie, $sql_list_mesta);

    $riadok_mesto = mysqli_fetch_array($vysledok_list_mesta);

    $fk_mesto = $riadok_mesto['pk_mesto'];


    $sql_update_udaje = "UPDATE
    tb_osoba
    SET 
    meno = '$meno', priezvisko='$priezvisko', pohlavie='$pohlavie',  adresa='$adresa', telefon='$telefon', email='$email', fk_mesto='$fk_mesto'
    WHERE
    pk_osoba = '$id'";
    
    $uprav_udaje = mysqli_query($db_spojenie, $sql_update_udaje);

}

if(!$uprav_udaje)
    {
        echo "Nepodarilo sa upraviť údaje v databáze!";
    }
    $sql_udaje = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id'");
    $osobne_udaje = mysqli_fetch_array($sql_udaje);
    $pk_mesto = $riadok['fk_mesto'];
    
    $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
    $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

    //prevzatie udajov o pouzivatelovi z databazy a ulozenie do session
    $_SESSION['meno'] = $osobne_udaje['meno'];
    $_SESSION['priezvisko'] = $osobne_udaje['priezvisko'];
    $_SESSION['pohlavie'] = $osobne_udaje['pohlavie'];
    $_SESSION['adresa'] = $osobne_udaje['adresa'];
    $_SESSION['telefon'] = $osobne_udaje['telefon'];
    $_SESSION['email'] = $osobne_udaje['email'];
    $_SESSION['mesto'] = $riadok_mesto['mesto'];
    $_SESSION['psc'] = $riadok_mesto['psc'];
    $_SESSION['dat_registracie'] = $osobne_udaje['dat_registracie'];
    echo '<script> location.replace("profil.php"); </script>';
}
}
include "body_end.php";
include "html_pata.php";
?>