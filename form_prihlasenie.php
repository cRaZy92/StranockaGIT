<body class="text-center">

<form class="form-signin" action="db_prihlasenie.php" method="post">
<?php
if(isset($_SESSION['n_user']))
{
    //hlasenie o uspesnej registracii
    echo '<div class="alert alert-success">
<strong>Úspešne registrovaný!</strong> Môžeš sa prihlásiť.
</div>';
}
?>
      <img class="mb-4" src="https://openclipart.org/download/185270/Light-Bulb-Icon.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Prihlás sa</h1>
      <div class="input-group">
      <input type="text" name="nick" class="form-control" placeholder="Nick" required autofocus>
      </div>
      <input type="password" name="heslo" id="inputPassword" class="form-control" placeholder="Heslo" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember_me" value="1" id="remember_me"> Zapamätať si ma
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="ok">Prihlásiť</button>
    </form>
    