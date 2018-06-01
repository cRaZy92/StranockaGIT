<?php
session_start();
$titulok="Fórum";
include "html_hlavicka_custom.php";
include "body_start.php";
require "db_pripojenie.php";

if(isset($_POST['id_otazky'])){
    $_SESSION['id_otazky'] = $_POST['id_otazky'];
}
$id_otazky = $_SESSION['id_otazky'];
$info_otazky = mysqli_query($db_spojenie, "SELECT * FROM tb_otazky WHERE id_otazky='$id_otazky'");
    $riadok_info = mysqli_fetch_array($info_otazky);
    $otazka = $riadok_info['otazka'];
    echo "$otazka";

include "form_komentar.php";

if(isset($_POST['ok'])){

        $komentar = $_POST['komentar'];
        $nick = $_SESSION['nick'];

$db_uloz_komentar   = mysqli_query($db_spojenie,"INSERT INTO tb_komentare (id_otazky_k, komentar, nick, cas) VALUES ('$id_otazky', '$komentar', '$nick', NOW())");

if (!$db_uloz_komentar) {
    die ('Chyba zaslania príkazu SQL, pri odoslani komentaru do tabuľky.'  . mysqli_error($db_spojenie));
}
else{
echo "Komentár zaslaný. <br>";
echo '<script> location.replace("komentovanie.php"); </script>';
}
}

// vypis kometarov
$komentare = mysqli_query($db_spojenie, "SELECT komentar, nick, cas FROM tb_komentare WHERE id_otazky_k='$id_otazky' ORDER BY cas DESC");
while($jeden_komentar = mysqli_fetch_array($komentare))
{
    include "komentar.php";
}

if($db_spojenie) mysqli_close($db_spojenie);

include "body_end.php";
include "html_pata.php";
?>