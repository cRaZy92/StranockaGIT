<?php
session_start();
$titulok="Zanechanie odkazu";
include "html_hlavicka.php";
include "body_start.php";
include "form_odkaz.php";

if(isset($_POST['ok'])){
    require "db_pripojenie.php";

        $sprava = $_POST['sprava'];
        $id = $_SESSION['pk_uzivatel'];

    $vysledok = mysqli_query($db_spojenie, "SELECT meno,priezvisko,email FROM tb_osoba WHERE pk_osoba='$id'");
        $riadok = mysqli_fetch_array($vysledok);
        $meno = $riadok['meno'];
        $priezvisko = $riadok['priezvisko'];
        $email = $riadok['email'];

$db_zanechaj_odkaz = mysqli_query($db_spojenie,"INSERT INTO db_odkazy (datum, meno, priezvisko, email, zapis) VALUES (NOW(),'$meno','$priezvisko','$email','$sprava')");

if (!$db_zanechaj_odkaz) {
    die ('Chyba zaslania príkazu SQL, pri odoslani zápisu do tabuľky.'  . mysqli_error($db_spojenie));
}
else
echo "Odkaz zaslaný. <br>";

if($db_spojenie) mysqli_close($db_spojenie);

}

include "body_end.php";
include "html_pata.php";
?>