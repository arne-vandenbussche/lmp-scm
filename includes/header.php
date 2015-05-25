<?php
/* 
 * Header voor de hoofdpagina.
 * Bevat de head-sectie met verwijzingen naar de juiste stylesheets.
 * Wordt gebruikt in combinatie met footer.
 * Bevat ook het hoofdmenu, en de basisindeling.
 */
?>
<!doctype html>
<html lang="nl">
<head>
    <title>LMP contactgegevens</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="lmp-scm">
    <link rel="icon" href="images/favicon.ico">
    <meta name="author" content="Arne Vandenbussche">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    
    <!-- Custom styles for login page -->
    <link href="./css/signin.css" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LMP Contactgegevens</a>
        </div>
          <p class="navbar-text">Welkom 
              <?php if (isset($_SESSION['userFirstName'])){echo $_SESSION['userFirstName'];} ?></p>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#over">Over</a></li>
            <?php if (isset($_SESSION['userFirstName'])){echo '<li><a href="uitloggen.php">Uitloggen</a></li>';} ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <a id="Home"></a>
     <div class="mijntitel">
        <h1>Beheer contactgegevens LMP</h1>
        <p class="lead">
           Met deze webapplicatie beheer je de contactgegevens van de oud-leiding
            (en sommige oud-leden) van chiro Knipoog - Sint-Elisabeth in Kortrijk.
        </p>
      </div> 

    
