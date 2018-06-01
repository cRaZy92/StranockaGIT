<?php
session_start();
$titulok="Prihlaseny";
include "html_hlavicka.php";
include "body_start.php";

require "db_pripojenie.php";    

        $id = $_SESSION['pk_uzivatel'];

        $vysledok = mysqli_query($db_spojenie, "SELECT meno,priezvisko,rodne_cislo,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id'");
        $riadok = mysqli_fetch_array($vysledok);
        $pk_mesto = $riadok['fk_mesto'];
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        echo "Tvoje unique ID je: " . $id;

        echo "<br>Meno: " . $riadok['meno'];
        echo "<br>";
        echo "Priezvisko: " . $riadok['priezvisko'];
        echo "<br>Adresa: " . $riadok['adresa'];
        echo "<br>";
        echo "Telefon: " . $riadok['telefon'];
        echo "<br>";
        echo "Email: " . $riadok['email'];
        echo "<br>";
        echo "Mesto: " . $riadok_mesto['mesto'];
        echo "<br>";
        echo "PSČ mesta: " . $riadok_mesto['psc'];
        echo "<br>";
        echo "<br>";
        echo "Účet vytvorený: " . $riadok['dat_registracie'];
        echo "<hr>";
        echo "<a href='profil_edit.php'>Upaviť profil</a>";

    if ($db_spojenie) mysqli_close($db_spojenie);


include "body_end.php";
include "html_pata.php";
?>