<?php
session_start();
$titulok="SQL Registracia";
include "html_hlavicka.php";
require "form_registracia.php";

if (isset($_POST['ok'])){

   // require "db_pripojenie.php";

    $db_spojenie = mysqli_connect('127.0.0.1', 'root', '', 'db_lolwtf', '3306');
    
    if (!$db_spojenie) {    
        echo 'Vzniknutá chyba: ' . mysqli_connect_error();
        die ('Pripojenie k databáze sa nepodarilo');
        }
    
    mysqli_query($db_spojenie, "SET NAMES 'utf8'");


    $nick = $_POST['nick'];
    $heslo = $_POST['heslo'];
    $heslo_z = $_POST['heslo_z'];
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $rodne_cislo = $_POST['rodne_cislo'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $date = date("Y-m-d");
    $mesto = $_POST['mesto'];
    $psc = $_POST['psc'];



    if($heslo == $heslo_z){

      //  $objekt_vysledkov = mysqli_query($db_spojenie, 'SELECT nick FROM tb_uzivatel WHERE nick="$nick"');
     //   if(!$objekt_vysledkov){

    $sql_mesta = "SELECT 
        pk_mesto,
        mesto,
        psc
    FROM
        tb_mesto
    WHERE
        mesto ='$mesto'";
     
$vysledok = mysqli_query($db_spojenie, $sql_mesta);

if(!$vysledok)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
else
{
if(mysqli_num_rows($vysledok) == 0)
{
/*
Vložiť nové mesto do tb_mesto

*/
    $sql_vloz_mesto = "INSERT INTO
        tb_mesto
        (mesto, psc)
    VALUES
        ('$mesto', '$psc')";

    $registruj_mesto = mysqli_query($db_spojenie, $sql_vloz_mesto);

    if (!$registruj_mesto) {
        die ('Chyba zaslania príkazu SQL, pri odoslani mesta do tb.'  . mysqli_error($db_spojenie));
    }
    else
    echo "mesto vložené do tabuľky. <br>";

    $vysledok = mysqli_query($db_spojenie, $sql_mesta);

    $riadok = mysqli_fetch_array($vysledok);

    $fk_mesto = $riadok['pk_mesto'];

    $sql_login1 = "INSERT INTO
        tb_uzivatel 
        (nick, heslo)
    VALUES
        ('$nick', '$heslo')";

        $registruj_login = mysqli_query($db_spojenie, "INSERT INTO
        tb_uzivatel 
        (nick, heslo)
    VALUES
        ('$nick', '$heslo')");

    $sql_udaje = "INSERT INTO
        tb_osoba
        (meno, priezvisko, rodne_cislo, adresa, telefon, email, dat_registracie, fk_mesto)
    VALUES
        ('$meno', '$priezvisko', '$rodne_cislo', '$adresa', '$telefon', '$email', '$date', '$fk_mesto')";
     

        $registruj_udaje = mysqli_query($db_spojenie, "INSERT INTO
        tb_osoba
        (meno, priezvisko, rodne_cislo, adresa, telefon, email, dat_registracie, fk_mesto)
    VALUES
        ('$meno', '$priezvisko', '$rodne_cislo', '$adresa', '$telefon', '$email', '$date', '$fk_mesto')");



if (!$registruj_login && !$registruj_udaje) {
    die ('Chyba zaslania príkazu SQL pri registracii'  . mysqli_error($db_spojenie));
}
else {
    echo 'Uspešne registrovany'; 

}

}
else
{
// dasdsadddddddddddddddddddddddddddddddddddddddddddddddddddddddddd

 
    $riadok = mysqli_fetch_array($vysledok);
    if($psc == $riadok['psc'])    //skontroluje ci sa psc mesta zhoduje z psc vlozeneho osobou
    {
        $fk_mesto = $riadok['pk_mesto'];
    }
    else{
        echo "zadali ste spravne PSČ?";

    }

    $sql_login2 = "INSERT INTO
        tb_uzivatel 
        (nick, heslo)
    VALUES
        ('$nick', '$heslo')";

    $sql_udaje = "INSERT INTO
        tb_osoba
        (meno, priezvisko, rodne_cislo, adresa, telefon, email, dat_registracie, fk_mesto)
    VALUES
        ('$meno', '$priezvisko', '$rodne_cislo', '$adresa', '$telefon', '$email', '$date', '$fk_mesto')";
     
$registruj_login = mysqli_query($db_spojenie, "INSERT INTO
tb_uzivatel 
(nick, heslo)
VALUES
('$nick', '$heslo')");


$registruj_udaje = mysqli_query($db_spojenie, "INSERT INTO
tb_osoba
(meno, priezvisko, rodne_cislo, adresa, telefon, email, dat_registracie, fk_mesto)
VALUES
('$meno', '$priezvisko', '$rodne_cislo', '$adresa', '$telefon', '$email', '$date', '$fk_mesto')");

if (!$registruj_login && !$registruj_udaje) {
    die ('Chyba zaslania príkazu SQL pri registracii'  . mysqli_error($db_spojenie));
}
else {
    echo 'Uspešne registrovany'; 

}
// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    }

}

}
else
echo "Hesla sa nezhoduju!";

}
 //  if ($db_spojenie) mysqli_close($db_spojenie);
include "html_pata.php";
?>