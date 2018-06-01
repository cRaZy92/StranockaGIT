<form action="db_registracia.php" method="post">
    <fieldset>
    <legend>Prihlasovacie udaje</legend>
        <p>Nick: <input type="text" name="nick" required></p>
        <p>Heslo: <input type="password" name="heslo" required></p>
        <p>Heslo znova: <input type="password" name="heslo_z" required></p>
    </fieldset>
    <fieldset>
    <legend>Osobne udaje</legend>
        <p>Meno: <input type="text" name="meno" required></p>
        <p>Priezvisko: <input type="text" name="priezvisko" required></p>
        <p>Rodné číslo: <input type="text" name="rodne_cislo" required></p>
        <p>Adresa: <input type="text" name="adresa" required></p>
        <p>Telefónne číslo: <input type="text" name="telefon" required></p>
        <p>Email: <input type="text" name="email" required></p>
        <p>Mesto: <input type="text" name="mesto" required></p>
        <p>Mesto PSČ: <input type="text" name="psc" required></p>

    </fieldset>
    <input type="submit" name="ok" value="Registruj sa" class="btn btn-success">
</form>