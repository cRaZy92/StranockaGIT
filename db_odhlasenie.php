<?php
session_start();
if(isset($_SESSION['signed_in']))
//if($_SESSION['signed_in']==true)
{
  session_destroy();

    //header('Refresh: 1; URL=index.php');
    echo '<script> location.replace("index.php"); </script>';
}
else{
$titulok="Chyba!";
include "html_hlavicka.php";
include "body_start.php";
echo 'Nie si prihlásený, ak si frajer, tak sa <a href="db_prihlasenie.php">prihlás!</a>'; 
include "body_end.php";
include "html_pata.php";
}
?>