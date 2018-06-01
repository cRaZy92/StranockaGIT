<?php
session_start();
$titulok="SQL Prihlasenie";
include "html_hlavicka.php";
require "form_prihlasenie.php";

if (isset($_POST['ok'])){
    //require "db_pripojenie.php";


    $db_spojenie = mysqli_connect('127.0.0.1', 'root', '', 'db_lolwtf', '3306');
    
    if (!$db_spojenie) {    
        echo 'Vzniknutá chyba: ' . mysqli_connect_error();
        die ('Pripojenie sa nepodarilo');
        }
    
    
        mysqli_query($db_spojenie, "SET NAMES 'utf8'");

    $nick = $_POST['nick'];
    $heslo = $_POST['heslo'];
     
   /* $sql_prikaz = "SELECT pk_uzivatel,nick,heslo FROM tb_uzivatel WHERE nick='$nick' AND heslo='$heslo'";
    $vysledok = mysqli_query($db_spojenie, $sql_prikaz);
    $riadok = mysqli_fetch_array($vysledok);
    
*/

    $sql = "SELECT 
        pk_uzivatel,
        nick,
        heslo
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'
    AND
        heslo = '$heslo'";
     
$vysledok = mysqli_query($db_spojenie, $sql);
if(!$vysledok)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
else
{
if(mysqli_num_rows($vysledok) == 0)
{
echo 'Zle meno alebo heslo.';
}
else
{
$_SESSION['signed_in'] = true;
 
    $riadok = mysqli_fetch_array($vysledok);
    $_SESSION['pk_uzivatel']    = $riadok['pk_uzivatel'];
    $_SESSION['nick']    = $riadok['nick'];
 
echo 'Vitaj, ' . $_SESSION['nick'] . '. <a href="profil.php">Profil</a>.';
/*
}





    if($heslo == $riadok['heslo']) {
        $id_pouzivatela=$riadok['pk_uzivatel'];
        //echo "Vitaj číslo $id_pouzivatela";




        //header('Location: profil.php'.$_GET['previouspage']);
       header('location: profiltest.php');
        //echo "<a href='profil.php'>Zobrazit profil</a>";

       // include "profil.php";
        die;
    }
    
    else{
       echo "Nesprávne meno alebo heslo";
    }


    if (!$vysledok) {
        die ('Chyba zaslania príkazu SQL'  . mysqli_error($db_spojenie));
   
    }
*/
}

}
}
   // if ($db_spojenie) mysqli_close($db_spojenie);




include "html_pata.php";
?>