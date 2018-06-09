<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">Domov</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            
          <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="db_ucivo.php">Učivo</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="db_odkaz.php">Zanechaj odkaz</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="db_forum.php">Fórum</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="db_odhlasenie.php">Odhlásiť</a>
          </li>
          
        </ul>
        <div class="text-info">
        Prihlásený používateľ <a href="profil.php" class="text-danger"> <?php echo $_SESSION['nick']; ?></a>
        </div>
      </div>
    </nav>
