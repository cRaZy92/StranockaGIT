<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Domov</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            
        <li class="divider-vertical"></li>

          <li class="nav-item">
            <a class="nav-link text-light" href="db_ucivo.php"><i class="fas fa-code"></i> Učivo</a>
          </li>

          <li class="divider-vertical"></li>

          <li class="nav-item">
            <a class="nav-link text-light" href="db_odkaz.php"><i class="far fa-envelope"></i> Zanechaj odkaz</a>
          </li>
          
          <li class="divider-vertical"></li>

          <li class="nav-item">
            <a class="nav-link text-light" href="db_forum.php"><i class="fab fa-stack-exchange"></i> Fórum</a>
          </li>
          
        </ul>

        <div class="nav-item dropdown" id="user_menu">
                <a class="nav-link dropdown-toggle text-info" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span  style="font-size:18px"><i class="fas fa-user"></i>  <?php echo $_SESSION['nick']; ?></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="profil.php"><i class="far fa-address-card"></i> Zobraziť profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="db_odhlasenie.php"><i class="fas fa-sign-out-alt"></i> Odhlásiť</a>
                </div>
        </div>
      </div>
</nav>
