<?php
session_start();

if(!isset($_SESSION['signed_in']))
{    
    include "chyba_prihlasenia.php";
}
else
{
    $titulok="Učivo";
    include "html_hlavicka.php";
    include "body_start.php";


require "form_ucivo.php";

if(isset($_POST['ok'])){
$vyber=$_POST['ucivo'];

switch($vyber){
    case "sql_databazy":
    include_once "content_sql_databazy.php";
    break;
    case "php_databazy":
    include_once "content_php_databazy.php";
    break;
}
}
}
/*
toto bol pokus o to, aby po stlačení tlačidla ma prehodilo na druhú stránku, 
ale došlo mi, že momentálne to je zbytočné, ale v budúcnosti by sa to mohlo hodiť :)

function a(){
    header('Refresh: 2; URL=content_sql_databazy.php');
}

function b(){
    header('Refresh: 2; URL=content_php_databazy.php');
}

//header('Refresh: 2; URL=content_'.$vyber.'.php');


switch($vyber){
    case "sql_databazy":
    a();
    case "php_databazy":
    b();
}*/

include "body_end.php";
include "html_pata.php";
?>