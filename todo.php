<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)//test či je použivatel admin
{
$titulok="To-Do list"; //ak ano tak zobrazi todo list
include "html_hlavicka.php";
require "todo_list.php";
include "html_pata.php";
}
else{
    $titulok="Chyba!"; //ak nie tak napise chybu
    include "html_hlavicka.php";
    echo "Nedostatočné práva!";
    include "html_pata.php";
}
?>
