<?php
session_start();
$titulok="Prihlásenie";
include "html_hlavicka.php";
include "body_start.php";
require "form_prihlasenie.php";

if (isset($_POST['ok'])){
    require "db_pripojenie.php";
       
    $nick = $_POST['nick'];
    $password = $_POST['heslo'];
     
    $sql = "SELECT 
        pk_uzivatel,
        nick,
        heslo
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'";
     
$vysledok = mysqli_query($db_spojenie, $sql);
if(!$vysledok)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
else
{
if(mysqli_num_rows($vysledok) == 0)
{
echo 'Zle meno alebo heslo. Skús to znova, alebo sa <a href="db_registracia.php">registruj</a>.';
}
else
{
    $riadok = mysqli_fetch_array($vysledok);
    $hashed_password = $riadok['heslo'];
    if(password_verify($password, $hashed_password) == true) {

    $_SESSION['pk_uzivatel']    = $riadok['pk_uzivatel'];
    $_SESSION['nick']    = $riadok['nick'];
    $_SESSION['signed_in'] = true;
    $id = $riadok['pk_uzivatel'];

$sql_update_last = "UPDATE
tb_uzivatel
SET 
last_login = NOW()
WHERE
pk_uzivatel = '$id'";


$last_login = mysqli_query($db_spojenie, $sql_update_last);

if(!$last_login)
{
    echo "ERROR: Nepodarilo sa zapísať čas posledného loginu!";

}
 

echo 'Vitaj, ' . $_SESSION['nick'];
echo '<br>';   
echo 'Uspešne prihlaseny.';   
echo '<script> location.replace("index.php"); </script>';
//    header('Refresh: 2; URL=index.php');
}
else{
echo "Nesprávne heslo!";
//print_r($password);
//print_r($hashed_password);
}
}


}
if($db_spojenie) mysqli_close($db_spojenie);
}
include "body_end.php";
include "html_pata.php";
?>