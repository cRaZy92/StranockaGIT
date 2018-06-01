<?php
function loginCheck(){
      if(isset($_SESSION['signed_in'])){  
            if($_SESSION['pk_uzivatel'] == 1 || $_SESSION['pk_uzivatel'] == 5){ //kontrola administratora
                  $_SESSION['admin'] = true;
                  include "menu_admin.php";
            }
            else{
                  $_SESSION['admin'] = false;
                  include "menu2.php";
            }
            }
      else{
   include "menu1.php";
      }
}
?>