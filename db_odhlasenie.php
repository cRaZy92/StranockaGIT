<?php
session_start();
if($_SESSION['signed_in']==true){
  $_SESSION['signed_in']=false;

    header('Refresh: 1; URL=index_.php');
}
else{
echo "Nie si prihlásený, ak si frajer, tak sa prihlás!";

}

?>