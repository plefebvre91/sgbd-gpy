<?php
$page = $_GET["action"];
if(empty($page)){
  $page = "accueil";
}
$page = $page.".php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dotgame - Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Our CSS -->
    <link href="css/style.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Afficher le menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">dot<span class="game">game</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?action=">Accueil</a></li>
            <li><a href="index.php?action=consultation">Consultation</a></li>
            <li><a href="index.php?action=ajout">Ajout</a></li>
            <li><a href="index.php?action=maj">Mise à jour</a></li>
            <li><a href="index.php?action=suppression">Supression</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
     
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>dot<span class="game">game</span></h1>
        <p>Bienvenue sur l'interface de notre projet de SGBD</p>
      </div>

    </div> <!-- /container -->

    <div class="container">
     
 <?php require($page); ?>
 <div class="row">
        <div class="span1">
          <p class="lead text-center">Cliquez sur la barre située en haut de la page selon l'action que vous souhaitez effectuer.</p>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-md-3"> -->
        <!--   <a href="consultation.html" class="btn btn-warning btn-block btn-lg">Consultation</a> -->
        <!-- </div> -->
        <!-- <div class="col-md-3"> -->
        <!--   <a href="ajout.html" class="btn btn-warning btn-block btn-lg">Ajout</a> -->
        <!-- </div> -->
        <!-- <div class="col-md-3"> -->
        <!--   <a href="maj.html" class="btn btn-warning btn-block btn-lg">Mise à jour</a> -->
        <!-- </div> -->
        <!-- <div class="col-md-3"> -->
        <!--   <a href="supression.html" class="btn btn-warning btn-block btn-lg">Supression</a> -->
        <!-- </div> -->
      </div>
    </div>

    <div id="footer">
      <div class="container text-center">
        <p class="text-muted credit">Projet SGBD - dotgame</p>
        <p class="credit">Grégoire PICHON - Pierre LEFEBVRE - Yvon GARBAGE</p>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
