<form action="profil_edit.php" method="post">
<?php
        require "db_pripojenie.php";
        $id = $_SESSION['pk_uzivatel'];
        $vysledok = mysqli_query($db_spojenie, "SELECT * FROM tb_osoba WHERE pk_osoba='$id'");
        $riadok = mysqli_fetch_array($vysledok);
        $meno_o = $riadok['meno'];
        $priezvisko_o = $riadok['priezvisko'];
        $rodne_cislo_o = $riadok['rodne_cislo'];
        $adresa_o = $riadok['adresa'];
        $telefon_o = $riadok['telefon'];
        $email_o = $riadok['email'];
        $fk_mesto = $riadok['fk_mesto'];

        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$fk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        $mesto_o = $riadok_mesto['mesto'];
        $psc_o = $riadok_mesto['psc'];
        ?>
        
    <fieldset>
    <legend>Osobne udaje</legend>
        <p>Meno: <input type="text" name="meno_n" value="<?php echo $meno_o; ?>"></p>
        <p>Priezvisko: <input type="text" name="priezvisko_n" value="<?php echo $priezvisko_o; ?>"></p>
        <p>Rodné číslo: <input type="text" name="rodne_cislo_n" value="<?php echo $rodne_cislo_o; ?>" ></p>
        <p>Adresa: <input type="text" name="adresa_n" value="<?php echo $adresa_o; ?>"></p>
        <p>Telefónne číslo: <input type="text" name="telefon_n" value="<?php echo $telefon_o; ?>"></p>
        <p>Email: <input type="text" name="email_n" value="<?php echo $email_o; ?>"></p>
        <p>Mesto: <input type="text" name="mesto_n" value="<?php echo $mesto_o; ?>"></p>
        <p>Mesto PSČ: <input type="text" name="psc_n" value="<?php echo $psc_o; ?>"></p>

    </fieldset>
    <input type="submit" name="ok" value="Potvrdiť zmeny" class="btn btn-success">
</form>