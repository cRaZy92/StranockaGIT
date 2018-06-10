<!-- **********************************
              Kubo a Adam
<********************************** -->
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
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  </head>
  <body>
    <?php
      require "login_check.php";
      loginCheck();
    ?>