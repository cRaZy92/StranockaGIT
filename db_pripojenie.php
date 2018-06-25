<?php
$testing = true;
if($testing != true){
$db_ip = 'fdb21.awardspace.net';
$db_login = '2722184_stranocka';
$db_pass = 'adamkojakubko123';
$db_name = '2722184_stranocka';
$db_port = '3306';   
}
else{
$db_ip = '127.0.0.1';
$db_login = 'root';
$db_pass = '';
$db_name = 'stranocka';
$db_port = '3306';  
}
$db_spojenie = mysqli_connect($db_ip,$db_login, $db_pass, $db_name,$db_port);

if (!$db_spojenie) {    
    echo 'Vzniknutá chyba: ' . mysqli_connect_error();
    die ('Pripojenie sa nepodarilo');
    }

mysqli_query($db_spojenie, "SET NAMES 'utf8'");
?>