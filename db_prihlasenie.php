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

$titulok="Prihlásenie";
include "html_hlavicka.php";

require "form_prihlasenie.php";

if(isset($_COOKIE['nick']) && isset($_COOKIE['password'])) { //ak su ulozene cookies, automaticky prihlasi
    $nick = $_COOKIE['nick'];
    $password = $_COOKIE['password'];
    require "db_pripojenie.php";
    $sql = "SELECT 
        pk_uzivatel, nick, heslo
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'";
     
$vysledok = mysqli_query($db_spojenie, $sql);
if(!$vysledok)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
else
{
if(mysqli_num_rows($vysledok) == 0) 
{
echo 'Zle meno alebo heslo. Skús to znova, alebo sa <a href="db_registracia.php">registruj</a>.'; //ak sa nenasla ziadna zhoda v databaze
}
else
{
    $riadok = mysqli_fetch_array($vysledok);
    $hashed_password = $riadok['heslo'];
    if(password_verify($password, $hashed_password) == true) {  //kontrola zhody hesla s heslom v databaze 
    $_SESSION['nick']    = $riadok['nick'];
    $_SESSION['pk_uzivatel']    = $riadok['pk_uzivatel'];
    $_SESSION['signed_in'] = true;  //uzivatel je prihlaseny
    $id = $_SESSION['pk_uzivatel'];

    $sql_udaje = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id'");
        $osobne_udaje = mysqli_fetch_array($sql_udaje);
        $pk_mesto = $osobne_udaje['fk_mesto'];
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        //prevzatie udajov o pouzivatelovi z databazy a ulozenie do session
        $_SESSION['meno'] = $osobne_udaje['meno'];
        $_SESSION['priezvisko'] = $osobne_udaje['priezvisko'];
        $_SESSION['pohlavie'] = $osobne_udaje['pohlavie'];
        $_SESSION['adresa'] = $osobne_udaje['adresa'];
        $_SESSION['telefon'] = $osobne_udaje['telefon'];
        $_SESSION['email'] = $osobne_udaje['email'];
        $_SESSION['mesto'] = $riadok_mesto['mesto'];
        $_SESSION['psc'] = $riadok_mesto['psc'];
        $_SESSION['dat_registracie'] = $osobne_udaje['dat_registracie'];

    $sql_update_last = "UPDATE
        tb_uzivatel
    SET 
        last_login = NOW()
    WHERE
        pk_uzivatel = '$id'";

$last_login = mysqli_query($db_spojenie, $sql_update_last);

if(!$last_login)
    echo "ERROR: Nepodarilo sa zapísať čas posledného loginu!";

        echo '<script> location.replace("index.php"); </script>';
    }
}
}
}

if (isset($_POST['ok'])){
    require "db_pripojenie.php";
       
    //prevzatie informacii z formulara
    $nick = $_POST['nick'];
    $password = $_POST['heslo'];
     
    //hladanie uzivatela v databaze podla nicku
    $sql = "SELECT 
        pk_uzivatel, nick, heslo
    FROM
        tb_uzivatel
    WHERE
        nick ='$nick'";
     
$vysledok = mysqli_query($db_spojenie, $sql);
if(!$vysledok)
{
echo 'Skus znova. Chyba:';
echo mysql_error();
}
else
{
if(mysqli_num_rows($vysledok) == 0) 
{
echo 'Zle meno alebo heslo. Skús to znova, alebo sa <a href="db_registracia.php">registruj</a>.'; //ak sa nenasla ziadna zhoda v databaze
}
else
{
    $riadok = mysqli_fetch_array($vysledok);
    $hashed_password = $riadok['heslo'];
    if(password_verify($password, $hashed_password) == true) {  //kontrola zhody hesla s heslom v databaze 
    $_SESSION['nick']    = $riadok['nick'];
    $_SESSION['pk_uzivatel']    = $riadok['pk_uzivatel'];
    $_SESSION['signed_in'] = true;  //uzivatel je prihlaseny
    $id = $_SESSION['pk_uzivatel'];

    if(isset($_POST['remember_me']) && $_POST['remember_me'] == 1)
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('nick', $nick, time() + (86400 * 30));
                    setcookie('password', $password, time() + (86400 * 30));
                    }



    $sql_udaje = mysqli_query($db_spojenie, "SELECT meno,priezvisko,pohlavie,adresa,telefon,dat_registracie,email,fk_mesto FROM tb_osoba WHERE pk_osoba='$id'");
        $osobne_udaje = mysqli_fetch_array($sql_udaje);
        $pk_mesto = $osobne_udaje['fk_mesto'];
        
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$pk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        //prevzatie udajov o pouzivatelovi z databazy a ulozenie do session
        $_SESSION['meno'] = $osobne_udaje['meno'];
        $_SESSION['priezvisko'] = $osobne_udaje['priezvisko'];
        $_SESSION['pohlavie'] = $osobne_udaje['pohlavie'];
        $_SESSION['adresa'] = $osobne_udaje['adresa'];
        $_SESSION['telefon'] = $osobne_udaje['telefon'];
        $_SESSION['email'] = $osobne_udaje['email'];
        $_SESSION['mesto'] = $riadok_mesto['mesto'];
        $_SESSION['psc'] = $riadok_mesto['psc'];
        $_SESSION['dat_registracie'] = $osobne_udaje['dat_registracie'];

    $sql_update_last = "UPDATE
        tb_uzivatel
    SET 
        last_login = NOW()
    WHERE
        pk_uzivatel = '$id'";

$last_login = mysqli_query($db_spojenie, $sql_update_last);

if(!$last_login)
    echo "ERROR: Nepodarilo sa zapísať čas posledného loginu!";
    unset($_SESSION['n_user']);

echo '<script> location.replace("index.php"); </script>';
//    header('Refresh: 2; URL=index.php');
}
else
    echo "Nesprávne heslo! Skús to znovu.";
}
}
    if($db_spojenie) mysqli_close($db_spojenie);
}
}
include "html_pata.php";
?>