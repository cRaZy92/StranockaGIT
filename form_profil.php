<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $_SESSION['nick']; ?></h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
      <?php
      if($_SESSION['pohlavie'] == "žena")
        echo '<img src="img_avatar_f.png" class="avatar img-circle img-thumbnail" alt="avatar">';
        else{
            if($_SESSION['pohlavie'] == "muž")
                echo '<img src="img_avatar_m.png" class="avatar img-circle img-thumbnail" alt="avatar">';
            else
                echo '<img src="img_avatar_i.png" class="avatar img-circle img-thumbnail" alt="avatar">';
        }
        ?>
        <input type="file" name="img" id="file" class="inputfile"/>
        <label for="file">Nahrať obrázok</label>
      
        <!--
        
        <h6>Nahraj nový obrázok</h6>
        <input type="file" class="text-center center-block file-upload">
        -->
      </div><br>

        <!--  Webstránka použivateľa       
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
        
          
        <ul class="list-group">
            <li class="list-group-item text-muted">Aktivita <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Otázky</strong></span> 19</li>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Komentáre</strong></span> 81</li>
          </ul>
        -->
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                  <form class="form" action="profil_edit.php" method="post">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Meno</h4></label>
                              <input type="text" class="form-control" name="meno_n" value="<?php echo $_SESSION['meno']; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Priezvisko</h4></label>
                              <input type="text" class="form-control" name="priezvisko_n" value="<?php echo $_SESSION['priezvisko']; ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Telefónne číslo</h4></label>
                              <input type="text" class="form-control" name="telefon_n" value="<?php echo $_SESSION['telefon']; ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="gender"><h4>Pohlavie</h4></label>
                            <?php
                                //aby si to nemusel upravovať vždy ked menis profil tak sa to upravi samo ;) konecne
                            switch($_SESSION['pohlavie']){
                                case "iné":
                                    echo '<p><select name="pohlavie_n" class="form-control">
                                        <option value="iné">Iné</option>
                                        <option value="muž">Muž</option>
                                        <option value="žena">Žena</option>       
                                        </select></p>';
                                break;
                                
                                case "muž":
                                    echo '<p><select name="pohlavie_n" class="form-control">
                                        <option value="muž">Muž</option>
                                        <option value="iné">Iné</option>
                                        <option value="žena">Žena</option>       
                                        </select></p>';
                                break;
                                
                                case "žena":
                                    echo '<p><select name="pohlavie_n" class="form-control">
                                        <option value="žena">Žena</option> 
                                        <option value="muž">Muž</option>
                                        <option value="iné">Iné</option>
                                        </select></p>';
                                break;
                                }
                            ?>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="mesto"><h4>Mesto</h4></label>
                              <input type="text" class="form-control" name="mesto_n" value="<?php echo $_SESSION['mesto']; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="psc"><h4>PSČ</h4></label>
                              <input type="text" class="form-control" name="psc_n" value="<?php echo $_SESSION['psc']; ?>">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="adresa"><h4>Adresa</h4></label>
                              <input type="text" class="form-control" name="adresa_n" value="<?php echo $_SESSION['adresa']; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                         
                          <div class="col-xs-6">
                              <label for="password"><h4>Heslo pre potvrdenie zmien</h4></label>
                              <input type="password" class="form-control" name="heslo_z" placeholder="Zadaj heslo" required>
                          </div>
                      </div>
                        
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" name="ulozit_zmeny">Uložiť</button>
                               	<button class="btn btn-lg" type="reset">Obnoviť</button>
                            </div>
                      </div>
              	</form>
              
                  </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->










<!--
****************************************************************************
-->

<!--<form action="profil_edit.php" method="post">
<?php
/*

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
        */
        ?>
        <p>Adresa: <input type="text" name="adresa_n" value="<?php //echo $adresa_o; ?>"></p>
        <p>Telefónne číslo: <input type="text" name="telefon_n" value="<?php //echo $telefon_o; ?>"></p>
        <p>Email: <input type="text" name="email_n" value="<?php //echo $email_o; ?>" ></p>
        <p>Mesto: <input type="text" name="mesto_n" value="<?php //echo $mesto_o; ?>"></p>
        <p>Mesto PSČ: <input type="text" name="psc_n" value="<?php //echo $psc_o; ?>"></p>

    </fieldset>
    <input type="submit" name="ok" value="Potvrdiť zmeny" class="btn btn-success">
</form>