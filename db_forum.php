<?php
session_start();
ob_start();
if(!isset($_SESSION['signed_in']))
{
    $titulok="Chyba!";
    include "html_hlavicka.php";
    include "body_start.php";
    echo 'Nie si prihlásený, <a href="db_prihlasenie.php">klikni sem pre prihlásenie.</a>'; 
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

?>



<!--
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="db_forum.php" method="post">

    <div class="container">
      <label for="otazka"><b>Otázka</b></label>
      <textarea ng-model="message" rows="2" cols="80" name="otazka" maxlength="500"></textarea> <br>
      <input type="text" placeholder="Otázka" name="otazka" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw">
        
      <button type="submit" name="ok">Položiť otázku</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

-->
<?php
if(isset($_POST['ok'])){

        $otazka = $_POST['otazka'];
        $id = $_SESSION['pk_uzivatel'];

$db_uloz_otazku = mysqli_query($db_spojenie,"INSERT INTO tb_otazky (user_id, otazka, cas) VALUES ('$id', '$otazka', NOW())");

if (!$db_uloz_otazku) {
    die ('Chyba zaslania príkazu SQL, pri odoslani otazky do tabuľky.'  . mysqli_error($db_spojenie));
}
else{
echo '<script> location.replace("db_forum.php"); </script>';
}
}

$otazky = mysqli_query($db_spojenie, "SELECT * FROM tb_otazky ORDER BY cas DESC");
if(mysqli_num_rows($otazky) == 0) 
{
    echo "Zatiaľ žiadne otázky.";
}
else{
while($jedna_otazka = mysqli_fetch_array($otazky))
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

if($db_spojenie) mysqli_close($db_spojenie);
}
if($p_otazok == 0 || $p_otazok >= 5){
    $otazka = "$p_otazok otázok.";
}
else{
    $otazka = "$p_otazok otázky.";
}

echo str_replace("##p_otazok##", $otazka, ob_get_clean());
?>
</main>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
include "html_pata.php";

?>
