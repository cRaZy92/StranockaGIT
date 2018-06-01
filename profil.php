<?php
session_start();
$titulok="Prihlaseny";
include "html_hlavicka.php";
include "menu2.php";
include "body_start.php";

//require "db_pripojenie.php";    

    $db_spojenie = mysqli_connect('127.0.0.1', 'root', '', 'db_lolwtf', '3306');
    
    if (!$db_spojenie) {    
        echo 'Vzniknutá chyba: ' . mysqli_connect_error();
        die ('Pripojenie sa nepodarilo');
        }
    
    
        mysqli_query($db_spojenie, "SET NAMES 'utf8'");

        $id = $_SESSION['pk_uzivatel'];

        $vysledok = mysqli_query($db_spojenie, "SELECT * FROM tb_osoba WHERE pk_osoba='$id'");
        $riadok = mysqli_fetch_array($vysledok);
        
        echo "Tvoje unique ID je: " . $id;

        echo "<br>Meno: " . $riadok['meno'];
        echo "<br>";
        echo "Priezvisko: " . $riadok['priezvisko'];
        echo "<br>Adresa: " . $riadok['adresa'];
        echo "<br>";
        echo "Telefon: " . $riadok['telefon'];
        echo "<br>";
        echo "Email: " . $riadok['email'];
        echo "<hr>";

        
        //include_once "profil_obsah.php";

    if ($db_spojenie) mysqli_close($db_spojenie);


include "body_end.php";
include "html_pata.php";
?>