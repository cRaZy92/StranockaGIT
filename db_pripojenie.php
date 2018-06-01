<?php

$db_ip = '127.0.0.1';
$db_login = 'root';
$db_pass = '';
$db_name = 'db_lolwtf';
$db_port = '3306';   

$db_spojenie = mysqli_connect($db_ip,$db_login, '', $db_name,$db_port);
//$db_spojenie = mysqli_connect('127.0.0.1', 'root', '', 'db_lolwtf', '3306');

if (!$db_spojenie) {    
    echo 'Vzniknutá chyba: ' . mysqli_connect_error();
    die ('Pripojenie sa nepodarilo');
    }

mysqli_query($db_spojenie, "SET NAMES 'utf8'");
?>