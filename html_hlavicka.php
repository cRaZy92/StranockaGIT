<!DOCTYPE html>
<html lang='sk'>
  <head>
    <title><?php
    echo $titulok; 
    ?></title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content='Adamko&Jakub'>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  

  </head>
  <body>

<br><br><br><br><br><br>
    <table width="90%" align="center" border="2" bordercolor="#003399" cellspacing="2">
      <tr id="nadpis">
      <td colspan="2">
      <h1 ><a href="index.php">Naša stránočka</a></h1>
      </td>
      </tr>
      <?php
      require "login_check.php";
      loginCheck();
      ?>