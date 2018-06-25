<?php
session_start();
if(!isset($_SESSION['signed_in']))
{
    include "chyba_prihlasenia.php";
}
else
{
if(isset($_GET['id_uzivatel'])){
    $id_other = $_GET['id_uzivatel'];
}
else
die("Chyba!");

$titulok="Profil použivateľa";
include "html_hlavicka.php";

require "db_pripojenie.php";    
$id = $_SESSION['pk_uzivatel'];

        $vysledok = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id_other'");
        $riadok_osoba = mysqli_fetch_array($vysledok);
        $pk_mesto = $riadok_osoba['fk_mesto'];

        $vysledok_uzivatel = mysqli_query($db_spojenie, "SELECT nick FROM tb_uzivatel WHERE pk_uzivatel='$id_other'");
        $riadok_uzivatel = mysqli_fetch_array($vysledok_uzivatel);
        
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        $date = $riadok_osoba['dat_registracie'];
        $date_u = DateTime::createFromFormat('Y-m-d', $date);
        $date_u = $date_u->format('d. m. Y');

        $requests = mysqli_query($db_spojenie, "SELECT id FROM friend_requests WHERE id_sender='$id' AND id_recipient='$id_other'");
        if(mysqli_num_rows($requests) != 0){
            $already_requested = true;
        }

        if(isset($_POST['pridat'])){
                $registruj_login = mysqli_query($db_spojenie, "INSERT INTO
                    friend_requests
                    (id_sender,id_recipient)
                VALUES
                    ('$id','$id_other')");
                $add_success=true;
                $already_requested = true;
        }
        require "html_profil_other.php";

    if ($db_spojenie) mysqli_close($db_spojenie);
}
include "html_pata.php";
?>