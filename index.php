<?php
session_start();
$titulok = "Domov";
include "html_hlavicka.php";
    
?>
    <main role="main" class="container">

      <div class="starter-template">
        <h1>Vitaj na našej stránke</h1>
        <?php
        if(!isset($_SESSION['signed_in'])){
            echo '<p class="lead">Teraz sa môžeš prihásiť alebo registrovať.</p>';
        }
        else{
            echo '<p class="lead">Úspešne prihásený.<br> Môžeš preskúmať náš web.</p>';
        }
        //print_r($_SESSION);
        ?>
      </div>

    </main><!-- /.container -->
<?php
    include "html_pata.php";

    ?>
