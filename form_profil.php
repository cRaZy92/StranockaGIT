<form action="profil_edit.php" method="post">
<?php

        require "db_pripojenie.php";
        $id = $_SESSION['pk_uzivatel']; //prevzatie ID uživateľa zo session
        $vysledok = mysqli_query($db_spojenie, "SELECT * FROM tb_osoba WHERE pk_osoba='$id'"); //hladanie informacii na základe ID uzivatela v tb_osoba
        $riadok = mysqli_fetch_array($vysledok);
        //prevzatie informácii z formulára na úpravu profilu
        $meno_o = $riadok['meno'];
        $priezvisko_o = $riadok['priezvisko'];
        $adresa_o = $riadok['adresa'];
        $telefon_o = $riadok['telefon'];
        $email_o = $riadok['email'];
        $fk_mesto = $riadok['fk_mesto'];

        //hľadanie mesta v tabuľke
        $vysledok_mesto = mysqli_query($db_spojenie, "SELECT mesto,psc FROM tb_mesto WHERE pk_mesto='$fk_mesto'");
        $riadok_mesto = mysqli_fetch_array($vysledok_mesto);

        $mesto_o = $riadok_mesto['mesto'];
        $psc_o = $riadok_mesto['psc'];
        ?>
    <fieldset>
    <legend>Osobne udaje</legend>
        <p>Meno: <input type="text" name="meno_n" value="<?php echo $meno_o; ?>"></p>
        <p>Priezvisko: <input type="text" name="priezvisko_n" value="<?php echo $priezvisko_o; ?>"></p>
        <?php
        //aby si to nemusel upravovať vždy ked menis profil tak sa to upravi samo ;) konecne
        $pohlavie_o = $riadok['pohlavie'];
        switch($pohlavie_o){
            case "iné":
            echo '<p>Pohlavie: <select name="pohlavie_n">
                 <option value="iné">Iné</option>
                 <option value="muž">Muž</option>
                 <option value="žena">Žena</option>       
                </select></p>';
            break;
            case "muž":
            echo '<p>Pohlavie: <select name="pohlavie_n">
                <option value="muž">Muž</option>
                <option value="iné">Iné</option>
                <option value="žena">Žena</option>       
                </select></p>';
            break;
            case "žena":
            echo '<p>Pohlavie: <select name="pohlavie_n">
            <option value="žena">Žena</option> 
            <option value="muž">Muž</option>
            <option value="iné">Iné</option>
            </select></p>';
            break;
        }
        ?>
        <p>Adresa: <input type="text" name="adresa_n" value="<?php echo $adresa_o; ?>"></p>
        <p>Telefónne číslo: <input type="text" name="telefon_n" value="<?php echo $telefon_o; ?>"></p>
        <p>Email: <input type="text" name="email_n" value="<?php echo $email_o; ?>" ></p>
        <p>Mesto: <input type="text" name="mesto_n" value="<?php echo $mesto_o; ?>"></p>
        <p>Mesto PSČ: <input type="text" name="psc_n" value="<?php echo $psc_o; ?>"></p>

    </fieldset>
    <input type="submit" name="ok" value="Potvrdiť zmeny" class="btn btn-success">
</form>