<?php
session_start();
if(!isset($_SESSION['signed_in']))
{
    $titulok="Chyba!";
    include "html_hlavicka.php";
    include "body_start.php";
    echo 'Nie si prihlásený, <a href="db_prihlasenie.php">klikni sem pre prihlásenie.</a>'; 
}
else
{
if(isset($_GET['id_uzivatel'])){
    $id_uzivatela_other = $_GET['id_uzivatel'];
}
else
die("Chyba!");

$titulok="Profil použivateľa";
include "html_hlavicka.php";
include "body_start.php";

require "db_pripojenie.php";    

        $vysledok = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id_uzivatela_other'");
        $riadok = mysqli_fetch_array($vysledok);
        $pk_mesto = $riadok['fk_mesto'];
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        echo "<br>Meno: " . $riadok['meno'];
        echo "<br>";
        echo "Priezvisko: " . $riadok['priezvisko'];
        echo "<br>";
        echo "Pohlavie: ". $riadok['pohlavie'];
        echo "<br>";
        echo "Adresa: " . $riadok['adresa'];
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

        $date = $riadok['dat_registracie'];
        $date_u = DateTime::createFromFormat('Y-m-d', $date);
        $date_u = $date_u->format('d. m. Y');
        echo "Účet vytvorený: " . $date_u;
        echo "<hr>";

    if ($db_spojenie) mysqli_close($db_spojenie);
}
include "body_end.php";
include "html_pata.php";
?>