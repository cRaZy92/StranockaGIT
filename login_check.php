<?php
function loginCheck(){
    if($_SESSION['signed_in']==true)
      include "menu2.php";
else
      include "menu1.php";
}
?>