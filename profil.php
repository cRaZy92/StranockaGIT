<?php
session_start();
//$begin_time=microtime(true);
if(!isset($_SESSION['signed_in']))
{
    $titulok="Chyba!";
    include "html_hlavicka.php";
    echo 'Nie si prihlásený, <a href="db_prihlasenie.php">klikni sem pre prihlásenie.</a>'; 
}
else
{
    $titulok="Profil";
    include "html_hlavicka.php";
    require "db_pripojenie.php";
        $id = $_SESSION['pk_uzivatel'];
        $date = $_SESSION['dat_registracie'];
        $date_u = DateTime::createFromFormat('Y-m-d', $date);
        $date_u = $date_u->format('d. m. Y');
        
        include "html_profil.php";

}

include "html_pata.php";
//$total_time=microtime(true)-$begin_time;
//echo $total_time;
?>