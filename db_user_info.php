<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)//test či je použivatel admin
{
$titulok = "Uživatelia"; //ak ano tak zobrazi vsetkych uzivatelov
include "html_hlavicka.php";

require "db_pripojenie.php";
echo '<div class="container">';
echo "<br>";
echo "<br>";
  
if(isset($_POST['id_uzivatela'])) {
  $id_uzivatela = $_POST['id_uzivatela'];
} 

$uzivatel = mysqli_query($db_spojenie, "SELECT meno, priezvisko, FROM tb_uzivatel WHERE pk_osoba='$id_uzivatela'");

if (!$uzivatelia) 
die ('Chyba zaslania príkazu SQL'  . mysqli_error($db_spojenie));
?>
<table class="table table-bordered">
<thead>
  <tr>
    <th>ID uzivatela (pk_uzivatel)</th>
    <th>Nick</th>
    <th>posledné prihlásenie (last_login)</th>
    <th> </th>
  </tr>
</thead>
  <form action="db_user_info.php" method="post">
<?php
while($jeden_uzivatel = mysqli_fetch_array($uzivatelia)) {
?>
    <tbody>
      <tr>
        <td><?php echo $jeden_uzivatel['pk_uzivatel']; ?></td>
        <td><?php echo $jeden_uzivatel['nick']; ?></td>
        <td><?php echo $jeden_uzivatel['last_login']; ?></td>
        
        <td><button type="submit" class="btn btn-success" name="id_uzivatela" value="<?php echo $jeden_uzivatel['pk_uzivatel']; ?>">Zobraziť informácie</button></td>
      </tr>
    <?php
}
echo "</form>";
echo "</tbody>";
echo "</table>";

echo '</div>';

if ($db_spojenie) mysqli_close($db_spojenie);
  
  
include "html_pata.php";
}
else{
    $titulok="Chyba!"; //ak nie tak napise chybu
    include "html_hlavicka.php";
    include "body_start.php";
    echo "Nedostatočné práva!";
    include "body_end.php";
    include "html_pata.php";
}





include "html_pata.php";
?>