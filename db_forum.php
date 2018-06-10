<!-- **********************************
                Adam
<********************************** -->
<?php
session_start();
ob_start();
if(!isset($_SESSION['signed_in']))
{
    include "chyba_prihlasenia.php";
}
else
{
if(!isset($p_otazok))
{
    $p_otazok = 0;
}
$titulok="Fórum";
include "html_hlavicka.php";

include "form_forum.php";
require "forum_start.php";
require "db_pripojenie.php";

if(isset($_POST['vloz_otazku'])){  //ak uzivatel chce vlozit novú otázku

        $otazka = $_POST['otazka'];
        $id = $_SESSION['pk_uzivatel'];

$db_uloz_otazku = mysqli_query($db_spojenie,"INSERT INTO tb_otazky (user_id, otazka, cas) VALUES ('$id', '$otazka', NOW())");  //vlozenie otazky do databazy

if (!$db_uloz_otazku) {
    die ('Chyba zaslania príkazu SQL, pri odoslani otazky do tabuľky.'  . mysqli_error($db_spojenie));
}
else{
echo '<script> location.replace("db_forum.php"); </script>';  //uspesne vlozenie do db
}
}

$otazky = mysqli_query($db_spojenie, "SELECT * FROM tb_otazky ORDER BY cas DESC"); //vybratie vsetkych otazok z db a zoradenie ich podla casu
if(mysqli_num_rows($otazky) == 0) 
{
    echo "Zatiaľ žiadne otázky.";   //ak neexistuju ziadne otazky v db 
}
else{
while($jedna_otazka = mysqli_fetch_array($otazky)) //vypisuje vsetky otazky v db 
{
    $id_uzivatela_o = $jedna_otazka['user_id'];
    $nick_sql = mysqli_query($db_spojenie, "SELECT nick FROM tb_uzivatel WHERE pk_uzivatel='$id_uzivatela_o'");
    $uzivatel = mysqli_fetch_array($nick_sql);
    $nick_uzivatela_o = $uzivatel['nick'];
    if($p_otazok < $jedna_otazka['id_otazky'])
    {
        $p_otazok = $jedna_otazka['id_otazky'];
    }
    include "otazka.php";
}

}
if($p_otazok == 0 || $p_otazok >= 5){
    $otazka = "$p_otazok otázok.";  
}
else{
    $otazka = "$p_otazok otázky.";
}

echo str_replace("##p_otazok##", $otazka, ob_get_clean());
if($db_spojenie) mysqli_close($db_spojenie);
}

?>
</main>
<script>
var modal = document.getElementById('id01');

// Ak uživatel klikne mimo okna, zavrie sa
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
include "html_pata.php";

?>
