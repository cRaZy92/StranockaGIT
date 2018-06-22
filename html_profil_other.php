<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $riadok_uzivatel['nick']; ?></h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <?php
        if($riadok_osoba['pohlavie'] == "žena")
        echo '<img src="img_avatar_f.png" class="avatar img-circle img-thumbnail" alt="avatar">';
        else{
            if($riadok_osoba['pohlavie'] == "muž")
                echo '<img src="img_avatar_m.png" class="avatar img-circle img-thumbnail" alt="avatar">';
            else
                echo '<img src="img_avatar_i.png" class="avatar img-circle img-thumbnail" alt="avatar">';
        }
        ?>
        
      </div></hr><br>

        <!--  Webstránka použivateľa       
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
        -->

        <?php
        $sql_otazky = "SELECT 
            id_otazky
        FROM
            tb_otazky
        WHERE
            user_id ='$id_uzivatela_other'";
     
$vsetky_otazky = mysqli_query($db_spojenie, $sql_otazky);
$p_otazok = mysqli_num_rows($vsetky_otazky);

$sql_komentare = "SELECT 
            id_otazky_k
        FROM
            tb_komentare
        WHERE
            user_id ='$id_uzivatela_other'";
     
$vsetky_komentare = mysqli_query($db_spojenie, $sql_komentare);
$p_komentarov = mysqli_num_rows($vsetky_komentare);


        ?>

          
          <ul class="list-group">
            <li class="list-group-item text-muted">Aktivita <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Otázky:</strong></span> <?php echo $p_otazok; ?></li>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Komentáre:</strong></span> <?php echo $p_komentarov; ?></li>
          </ul> 
          <br>
          <h6 class="text-center">Dátum registrácie: <?php echo $date_u; ?></h6>
          <br>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Meno a priezvisko</h4></label>
                              <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_osoba['meno'] . " " . $riadok_osoba['priezvisko']; ?></p>
                              <hr>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Email</h4></label>
                            <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_osoba['email']; ?></p>
                              <hr>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Telefónne číslo</h4></label>
                              <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_osoba['telefon']; ?></p>
                              <hr>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Pohlavie</h4></label>
                             <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_osoba['pohlavie']; ?></p>
                             <hr>
                          </div>
                        
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Mesto a PSČ</h4></label>
                              <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_mesto['mesto'] . ", " . $riadok_mesto['psc']; ?></p>
                              <hr>
                          </div>

                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Adresa</h4></label>
                              <p style="font-size:20px"><span>&#8203;</span> <span>&#8203;</span> <span>&#8203;</span> <?php echo $riadok_osoba['adresa']; ?></p>
                          </div>

                      </div>

              <hr>
              
            </div><!--/tab-pane-->               
               
                  
             
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->