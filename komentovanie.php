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
$titulok="Otázka";
include "html_hlavicka.php";
include "body_start.php";

if(isset($_POST['id_otazky'])){
    $_SESSION['id_otazky'] = $_POST['id_otazky']; 
}
$id_otazky = $_SESSION['id_otazky'];
    require "db_pripojenie.php";
$info_otazky = mysqli_query($db_spojenie, "SELECT * FROM tb_otazky WHERE id_otazky='$id_otazky'");
    $riadok_info = mysqli_fetch_array($info_otazky);
    $otazka = $riadok_info['otazka'];
    echo "<h3>$otazka</h3>";

// vypis kometarov
$komentare = mysqli_query($db_spojenie, "SELECT user_id,komentar, cas FROM tb_komentare WHERE id_otazky_k='$id_otazky' ORDER BY cas DESC");
if(mysqli_num_rows($komentare) == 0) 
{
    echo "Zatiaľ žiadne komentáre k tejto otázke.";
}
else{
while($jeden_komentar = mysqli_fetch_array($komentare))
{

    $id_uzivatela_k = $jeden_komentar['user_id'];
    $nick_sql = mysqli_query($db_spojenie, "SELECT nick FROM tb_uzivatel WHERE pk_uzivatel='$id_uzivatela_k'");
    $uzivatel = mysqli_fetch_array($nick_sql);
    $nick_uzivatela_k = $uzivatel['nick'];
    
    include "komentar.php";
}
echo "<br><br><br>";
}
include "form_komentar.php";

if(isset($_POST['ok'])){
        $komentar = $_POST['komentar'];
        $id = $_SESSION['pk_uzivatel'];
$db_uloz_komentar = mysqli_query($db_spojenie,"INSERT INTO tb_komentare (id_otazky_k, user_id, komentar, cas) VALUES ('$id_otazky', '$id', '$komentar', NOW())");

if (!$db_uloz_komentar) {
    echo "<br> id_otazky: ";
    print_r($id_otazky);
    echo "<br>";
    print_r($id);
    echo "<br>";
    print_r($komentar);
    //die ('Chyba zaslania príkazu SQL, pri odoslani komentaru do tabuľky.'  . mysqli_error($db_spojenie));
}
else{
echo "Komentár zaslaný. <br>";

echo '<script> location.replace("komentovanie.php"); </script>';
}
}
if ($db_spojenie) mysqli_close($db_spojenie);
}
include "body_end.php";
include "html_pata.php";
?>
