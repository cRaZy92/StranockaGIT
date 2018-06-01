<?php
session_start();
$titulok="Prihlaseny";
include "html_hlavicka.php";
include "body_start.php";
if($_SESSION['admin'] == true)
require "todo_list.php";
else{
    echo "Nedostatočné práva!";
}

include "body_end.php";
include "html_pata.php";
?>