<form action="db_registracia.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="heslo" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="heslo_z" required>
    <hr>

    <button type="submit" name="ok" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Už si zaregistrovaný? <a href="db_prihlasenie.php">Sign in</a>.</p>
  </div>
</form>