<?php
// vloženie udajov o pouzivatelovi do tb_osoba
    $registruj_udaje = mysqli_query($db_spojenie, "INSERT INTO
    tb_osoba
    (meno, priezvisko, rodne_cislo, adresa, telefon, email, dat_registracie, fk_mesto)
VALUES
    ('$meno', '$priezvisko', '$rodne_cislo', '$adresa', '$telefon', '$email', NOW(), '$fk_mesto')");

// vybratie pk_osoba z tb_osoba pre vlozenie login informacii
 $vysledok_pk = mysqli_query($db_spojenie, "SELECT 
 pk_osoba
 FROM
 tb_osoba
 WHERE
    rodne_cislo ='$rodne_cislo'");

$hashed_password = password_hash($heslo, PASSWORD_DEFAULT);

$riadok = mysqli_fetch_array($vysledok_pk);
    $pk_osoba = $riadok['pk_osoba'];
    if(!$pk_osoba)
    $pk_osoba = 1;
    
// vloženie login informacii do tb_uzivatel
    $registruj_login = mysqli_query($db_spojenie, "INSERT INTO
    tb_uzivatel 
    (pk_uzivatel,nick, heslo, last_login)
VALUES
    ('$pk_osoba','$nick', '$hashed_password', '0000-00-00 00:00:00')");
?>