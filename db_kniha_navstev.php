<?php
session_start();
$titulok="Kniha návštev";
include "html_hlavicka.php";
include "body_start.php";
include "form_kniha_navstev.php";

if(isset($_POST['ok'])){
    require "db_pripojenie.php";

//$db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_lolwtf','3306');

if(!$db_spojenie){
    echo 'Vzniknutá chyba: '.mysqli_connect_error();
    die('Pripojenie sa nepodarilo.');
}



$meno = $_POST['meno'];
$email = $_POST['email'];
$sprava = $_POST['sprava'];



// $registruj_navstevu = "INSERT INTO datum, meno, email, zapis FROM kniha_navsteve VALUES (NOW,'$meno','$email','sprava')";
$db_navsteva = mysqli_query($db_spojenie,"INSERT INTO kniha_navstev (datum, meno, email, zapis) VALUES (NOW(),'$meno','$email','$sprava')");

if (!$db_navsteva) {
    die ('Chyba zaslania príkazu SQL, pri odoslani zápisu do tabuľky.'  . mysqli_error($db_spojenie));
}
else
echo "Zápis odoslaný. <br>";

if($db_spojenie) mysqli_close($db_spojenie);

}

include "body_end.php";
include "html_pata.php";
?>