<?php
session_start();
$titulok="SQL Prihlasenie";
include "html_hlavicka.php";
include "body_start.php";
require "form_prihlasenie.php";

if (isset($_POST['ok'])){
    require "db_pripojenie.php";

  // $db_spojenie = mysqli_connect('127.0.0.1', 'root', '', 'db_lolwtf', '3306');
       
    $nick = $_POST['nick'];
    $heslo = $_POST['heslo'];
     

    $sql = "SELECT 
        pk_uzivatel,
        nick
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'
    AND
        heslo = '$heslo'";
     
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
    $_SESSION['pk_uzivatel']    = $riadok['pk_uzivatel'];
    $_SESSION['nick']    = $riadok['nick'];

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
    echo "error nejde to";

}
 
$_SESSION['signed_in'] = true;
echo 'Vitaj, ' . $_SESSION['nick'];
echo '<br>';   
echo 'Uspešne prihlaseny.';   
sleep(3);
echo '<script> location.replace("index.php"); </script>';
//    header('Refresh: 2; URL=index.php');
   
}


}
if($db_spojenie) mysqli_close($db_spojenie);
}
include "body_end.php";
include "html_pata.php";
?>