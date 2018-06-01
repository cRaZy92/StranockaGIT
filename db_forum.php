<?php
session_start();
$titulok="Fórum";
include "html_hlavicka_custom.php";
include "body_start.php";
include "form_forum.php";
require "db_pripojenie.php";

if(isset($_POST['ok'])){

        $otazka = $_POST['otazka'];
        $id = $_SESSION['pk_uzivatel'];

    $vysledok = mysqli_query($db_spojenie, "SELECT nick FROM tb_uzivatel WHERE pk_uzivatel='$id'");
        $riadok = mysqli_fetch_array($vysledok);
        $nick = $riadok['nick'];


$db_uloz_otazku = mysqli_query($db_spojenie,"INSERT INTO tb_otazky (nick, otazka, cas) VALUES ('$nick', '$otazka', NOW())");

if (!$db_uloz_otazku) {
    die ('Chyba zaslania príkazu SQL, pri odoslani otazky do tabuľky.'  . mysqli_error($db_spojenie));
}
else{
echo '<script> location.replace("db_forum.php"); </script>';
}
}


$otazky = mysqli_query($db_spojenie, "SELECT * FROM tb_otazky ORDER BY cas DESC");
while($jedna_otazka = mysqli_fetch_array($otazky))
{
    include "otazka.php";
}

if($db_spojenie) mysqli_close($db_spojenie);
include "body_end.php";
include "html_pata.php";
?>