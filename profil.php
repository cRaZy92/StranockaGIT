<?php
session_start();
//$begin_time=microtime(true);
if(!isset($_SESSION['signed_in']))
{
    $titulok="Chyba!";
    include "html_hlavicka.php";
    include "body_start.php";
    echo 'Nie si prihlásený, <a href="db_prihlasenie.php">klikni sem pre prihlásenie.</a>'; 
}
else
{
    $titulok="Profil";
    include "html_hlavicka.php";
    include "body_start.php";

        $id = $_SESSION['pk_uzivatel'];

        echo "Tvoje unique ID je: " . $id;

        echo "<br>Meno: " . $_SESSION['meno'];
        echo "<br>";
        echo "Priezvisko: " . $_SESSION['priezvisko'];
        echo "<br>";
        echo "Pohlavie: ". $_SESSION['pohlavie'];
        echo "<br>";
        echo "Adresa: " . $_SESSION['adresa'];
        echo "<br>";
        echo "Telefon: " . $_SESSION['telefon'];
        echo "<br>";
        echo "Email: " . $_SESSION['email'];
        echo "<br>";
        echo "Mesto: " . $_SESSION['mesto'];
        echo "<br>";
        echo "PSČ mesta: " . $_SESSION['psc'];
        echo "<br>";

        echo "<br>";
        $date = $_SESSION['dat_registracie'];
        $date_u = DateTime::createFromFormat('Y-m-d', $date);
        $date_u = $date_u->format('d. m. Y');
        echo "Účet vytvorený: " . $date_u;
        echo "<hr>";
        echo "<a href='profil_edit.php'>Upaviť profil</a>";
}


include "body_end.php";
include "html_pata.php";
//$total_time=microtime(true)-$begin_time;
//echo $total_time;
?>