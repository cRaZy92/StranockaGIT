<?php
function loginCheck(){
      if(isset($_SESSION['signed_in'])){  
            if($_SESSION['pk_uzivatel'] == 1 || $_SESSION['pk_uzivatel'] == 1) //kontrola administratora
                  include "menu_admin.php";
            else
                  include "menu2.php";
      }
      else{
   // if($_SESSION['signed_in']==true)
   include "menu1.php";
      }
}
?>