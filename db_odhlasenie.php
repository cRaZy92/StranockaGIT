<?php
session_start();
if(isset($_SESSION['signed_in']))  //ak je uživatel prihlaseny, vymaze vsetky premenne v session a cookies
{
  setcookie("nick", "", time()-3600);  
  setcookie("password", "", time()-3600);
  session_destroy();

  //header('Refresh: 1; URL=index.php');
  echo '<script> location.replace("index.php"); </script>';
}
else{
include "chyba_prihlasenia.php";
}
?>