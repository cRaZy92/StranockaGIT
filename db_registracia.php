<?php
session_start();
$titulok="SQL Registracia";
include "html_hlavicka.php";
include "body_start.php";
require "form_registracia.php";

if (isset($_POST['ok'])){

   require "db_pripojenie.php";

    $nick = $_POST['nick'];         //*
    $heslo = $_POST['heslo'];       //*
    $heslo_z = $_POST['heslo_z'];   //*
    $meno = $_POST['meno'];         
    $priezvisko = $_POST['priezvisko'];
    $rodne_cislo = $_POST['rodne_cislo'];//*
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];       //*
    $mesto = $_POST['mesto'];
    $psc = $_POST['psc'];

    

    if($heslo == $heslo_z){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format"; 
          }
          else{

    $sql_nick = "SELECT 
        nick
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'";
     
    $vysledok_nick = mysqli_query($db_spojenie, $sql_nick);
    if(!$vysledok_nick){
    echo 'Skus znova. Chyba:';
    echo mysql_error();
    }
    else{
    if(mysqli_num_rows($vysledok_nick) == 0)
        $nick_valid=true;
    else
        $nick_valid=false;
    }
    
    if($nick_valid == true){
    
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
//Vložiť nové mesto do tb_mesto

    $sql_vloz_mesto = "INSERT INTO
        tb_mesto
        (mesto, psc)
    VALUES
        ('$mesto', '$psc')";

    $registruj_mesto = mysqli_query($db_spojenie, $sql_vloz_mesto);

    if (!$registruj_mesto) {
        die ('Chyba zaslania príkazu SQL, pri odoslani mesta do tabuľky.'  . mysqli_error($db_spojenie));
    }
    else
    echo "Mesto vložené do tabuľky. <br>";

    $vysledok = mysqli_query($db_spojenie, $sql_mesta);

    $riadok = mysqli_fetch_array($vysledok);

    $fk_mesto = $riadok['pk_mesto'];

    require_once "registruj.php";
   

if (!$registruj_login && !$registruj_udaje) {   //kontrola pribehu zapisu do databazy
    die ('Chyba zaslania príkazu SQL pri registracii'  . mysqli_error($db_spojenie));
}
else {  //uspešná registrácia
   echo 'Uspešne registrovany, mozes sa prihlasit ';   
   // echo '<div class="loader"></div>';
   // header('Refresh: 3; URL=db_prihlasenie.php');   //prepoji na /db_prihlasenie.php
    echo '<script> location.replace("db_prihlasenie.php"); </script>';
}
}
else // ak sa mesto už nachádza v databaze
{

    $riadok = mysqli_fetch_array($vysledok);
  //if($psc == $riadok['psc'])    //skontroluje ci sa psc mesta zhoduje s psc vlozeneho osobou
  //  {
        $fk_mesto = $riadok['pk_mesto'];
 /*   }
    else{
        echo "zadali ste spravne PSČ?";
    }
*/
    require_once "registruj.php";

if (!$registruj_login && !$registruj_udaje) {   //kontrola pribehu zapisu do databazy
    die ('Chyba zaslania príkazu SQL pri registracii'  . mysqli_error($db_spojenie));
}
else {  //uspešná registrácia
  echo 'Uspešne registrovany'; 
   // echo '<div class="loader"></div>';
    //header('Refresh: 2; URL=db_prihlasenie.php'); //prepoji na /db_prihlasenie.php

    echo '<script> location.replace("db_prihlasenie.php"); </script>';
}
    }

}
if ($db_spojenie) mysqli_close($db_spojenie);   //odpojenie z databazy
    }
    else    //kontrola nicku - ak uz existuje
        echo "Nick uz existuje, zvol si iny!";
}
}

else    //kontrola zhody hesla - ak sa nezhoduju
echo "Hesla sa nezhoduju!";
}

include "body_end.php";
include "html_pata.php";
?>