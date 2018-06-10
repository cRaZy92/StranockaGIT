<!-- **********************************
                Adam
<********************************** -->
<?php
session_start();
if(!isset($_SESSION['signed_in']))
{
    include "chyba_prihlasenia.php";
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

require "db_pripojenie.php";    

        $vysledok = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id_uzivatela_other'");
        $riadok_osoba = mysqli_fetch_array($vysledok);
        $pk_mesto = $riadok_osoba['fk_mesto'];

        $vysledok_uzivatel = mysqli_query($db_spojenie, "SELECT nick FROM tb_uzivatel WHERE pk_uzivatel='$id_uzivatela_other'");
        $riadok_uzivatel = mysqli_fetch_array($vysledok_uzivatel);
        
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        $date = $riadok_osoba['dat_registracie'];
        $date_u = DateTime::createFromFormat('Y-m-d', $date);
        $date_u = $date_u->format('d. m. Y');

        require "html_profil_other.php";

    if ($db_spojenie) mysqli_close($db_spojenie);
}
include "html_pata.php";
?>