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
        <form action = "" method = "POST" enctype = "multipart/form-data">
        
        <input type = "file" name = "image" >
        <label for="file" class="btn btn-primary"> Nahrať obrázok </label>
        <input type = "submit" name="img">
        </form>
      </div><br>

        <!--  Webstránka použivateľa       
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
        
    -->
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            
        <form class="form" action="profil_edit.php" method="post">
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                  
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
</div>