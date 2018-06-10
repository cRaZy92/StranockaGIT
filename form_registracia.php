<!-- **********************************
                Adam
<********************************** -->
<form class="form-signin" action="db_registracia.php" method="post">
      <img class="mb-4" src="https://openclipart.org/download/185270/Light-Bulb-Icon.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registruj sa</h1>
      <input type="text" name="nick" class="form-control" placeholder="Nick" minlength="3" maxlength="10" required autofocus>
      <input type="email" name="email" class="form-control" placeholder="Emailová adresa" minlength="5" maxlength="40" required>
      <input type="password" name="heslo" id="inputPassword" class="form-control" placeholder="Heslo" minlength="4" maxlength="16" required>
      <input type="password" name="heslo_z" id="inputPassword" class="form-control" placeholder="Heslo znova" required>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="ok">Registrovať</button>
</form>
