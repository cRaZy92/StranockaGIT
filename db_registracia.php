<!-- **********************************
            Kubo a Adam
<********************************** -->
<?php
session_start();

if(isset($_SESSION['signed_in']))
{
    $titulok="Chyba!";
    include "html_hlavicka.php";
    include "body_start.php";
    echo 'Už si prihláseny! <a href="index.php">Klikni sem pre návrat.</a>'; 
}
else
{
$titulok="Registrácia";
include "html_hlavicka.php";
echo '<body class="text-center">';
require "form_registracia.php";

if (isset($_POST['ok'])){

   require "db_pripojenie.php";

    $nick = $_POST['nick'];    
    $heslo = $_POST['heslo'];   
    $heslo_z = $_POST['heslo_z'];   
    $email = $_POST['email'];       

    if($heslo != $heslo_z){
        echo "Heslá sa nezhodujú!"; 
          }else{

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Neplatný email"; 
          }
          else{

    $sql_nick = "SELECT 
        nick
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'";
     
    $vysledok_nick = mysqli_query($db_spojenie, $sql_nick);
    if(!$vysledok_nick){
    echo 'Skus znova. Chyba:';
    echo mysql_error();
    }
    else{
    if(mysqli_num_rows($vysledok_nick) != 0)    // kontrola nicku - nick je volny
        {
            echo "Nick sa už používa! Zvoľ si prosím iný.";
        }
        else{  
    require_once "registruj.php";

if (!$registruj_login && !$registruj_udaje) {   //kontrola pribehu zapisu do databazy
    die ('Chyba zaslania príkazu SQL pri registracii'  . mysqli_error($db_spojenie));
}
else {  //uspešná registrácia
   // header('Refresh: 3; URL=db_prihlasenie.php');   //prepoji na /db_prihlasenie.php
   $_SESSION['n_user'] = true;
    echo '<script> location.replace("db_prihlasenie.php"); </script>';
}   //uspesná registrácia
}   //registracia
}   //nick
    }   //mail
    }   //heslo
    if ($db_spojenie) mysqli_close($db_spojenie);   //odpojenie z databazy
        }      //isset [ok]
}
include "body_end.php";
include "html_pata.php";
?>