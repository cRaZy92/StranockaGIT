<form action="db_registracia.php" method="post">
    <fieldset>
    <legend>Prihlasovacie udaje</legend>
        <p>Nick: <input type="text" name="nick" required></p>
        <p>Heslo: <input type="password" name="heslo" required></p>
        <p>Heslo znova: <input type="password" name="heslo_z" required></p>
    </fieldset>
    <fieldset>
    <legend>Osobne udaje</legend>
        <p>Meno: <input type="text" name="meno" placeholder="Janko"></p>
        <p>Priezvisko: <input type="text" name="priezvisko" placeholder="Mrkvička"></p>
        <p>Rodné číslo: <input type="text" name="rodne_cislo" placeholder="0123456789" required></p>
        <p>Adresa: <input type="text" name="adresa" placeholder="Stojan,21"></p>
        <p>Telefónne číslo: <input type="text" name="telefon" placeholder="0987654321"></p>
        <p>Email: <input type="text" name="email" placeholder="jankomrkvicka@gmail.com" required></p>
        <p>Mesto: <input type="text" name="mesto" placeholder="Píšťany" ></p>
        <p>Mesto PSČ: <input type="text" name="psc" placeholder="92101"></p>

    </fieldset>
    <input type="submit" name="ok" value="Registruj sa" class="btn btn-success">
</form>