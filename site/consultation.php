<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes de consultation.</p>
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#consultation1" data-toggle="tab">Requête 1</a></li>
    <li><a href="#consultation2" data-toggle="tab">Requête 2</a></li>
    <li><a href="#consultation3" data-toggle="tab">Requête 3</a></li>
    <li><a href="#consultation-jeu" data-toggle="tab">Jeux</a></li>
    <li><a href="#consultation-joueur" data-toggle="tab">Joueurs</a></li>
    <li><a href="#consultation-categorie" data-toggle="tab">Catégories</a></li>
    <li><a href="#consultation-plateforme" data-toggle="tab">Plateformes</a></li>
    <li><a href="#consultation-editeur" data-toggle="tab">Editeurs</a></li>		
    <li><a href="#consultation-commentaire" data-toggle="tab">Commentaires</a></li>
    <li><a href="#consultation-pouce" data-toggle="tab">Appréciations de commentaires</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="consultation1">
      <div class="container">
	<p class="lead">L'ensemble des jeux critiqués disponibles sur une plateforme donnée, classés par catégorie.</p>
	<form action="#" id="form-consultation1">
 	  <div class="form-group">
	    <label for="nomPlateforme">Plateforme</label>
	    <div class="input-group">
	      <input type="text" name="nomPlateforme" id="nomPlateforme" class="form-control" placeholder="Saisissez la plateforme ici..">
      	      <span class="input-group-btn">
     	     	<input type="submit" class="btn btn-warning" id="btn-consultation1" value="Envoyer la requête">
      	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /form-group -->
	</form>
      </div> 
    </div>
    
    <div class="tab-pane" id="consultation2">
      <div class="container">
	<p class="lead">Pour un joueur donné, la liste des commentaires se référant à un jeu dans sa catégorie préférée,<br />
	  disponible sur sa plateforme préférée.</p>
	<form action="#" id="form-consultation2">
	  <div class="form-group">
	    <label for="pseudo">Pseudo du joueur</label>
	    <div class="input-group">
	      <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Saisissez le pseudo ici..">
      	      <span class="input-group-btn">
	     	<input type="submit" class="btn btn-warning" id="btn-consultation2" value="Envoyer la requête">
      	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /form-group -->
	</form>
      </div> 
    </div>

    <div class="tab-pane" id="consultation3">
      <div class="container">
	<p class="lead">Pour un commentaire, la liste des joueurs qui l'ont apprécié.</p>
   	<form action="#" id="form-consultation3">
   	  <div class="form-group">
	    <label for="idCommentaire">Numéro du commentaire</label>
	    <div class="input-group">
	      <input type="text" name="idCommentaire" id="idCommentaire" class="form-control" placeholder="Saisissez le numéro du commentaire ici.."/>
	      <span class="input-group-btn">
	     	<input type="submit" class="btn btn-warning" id="btn-consultation3" value="Envoyer la requête">
      	      </span>
	    </div><!-- /input-group -->
	  </div><!-- /form-group -->
	</form>
      </div> 
    </div>

    <div class="tab-pane" id="consultation-jeu">
      <div class="container">
	<table class="table table-striped">
	  <tr><th>Nom</th><th>&Eacute;diteur</th><th>Plateforme</th><th>Catégorie</th></tr>

	  <?php
	  $games = select_all("jeu");
	  
	  while($att = mysql_fetch_array($games)){
	    $id = $att["idJeu"];
	    $name = $att["nomJeu"];
	    $categories = get_game_categories($id);
	    $platforms = get_game_platforms($id);
	    echo "<tr><td>$id</td><td>$name</td><td>$platforms</td><td>$categories</td></tr>\n";
	  }?>

	</table>

      </div> 
    </div><!--consultation-jeu-->

    <div class="tab-pane" id="consultation-joueur">
      <div class="container">
	<table class="table table-striped">
	  <tr><th>Pseudo</th><th>Nom</th><th>Prénom</th><th>Adresse mail</th><th>Plateforme préférée</th><th>Catégorie préférée</th></tr>

	  <?php
	  $players = select_all("info_joueur");
	  
	  while($att = mysql_fetch_array($players)){
	    $id = $att["pseudo"];
	    $last_name = $att["nom"];
	    $first_name = $att["prenom"];
	    $mail = $att["mail"];
	    $category = $att["nomCategorie"];
	    $platform = $att["nomPlateforme"];
	    echo "<tr><td>$id</td><td>$last_name</td><td>$first_name</td><td>$mail</td><td>$platform</td><td>$category</td></tr>\n";
	  }?>
	</table>
      </div> 
    </div><!--consultation-joueur-->

    <div class="tab-pane" id="consultation-commentaire">
      <div class="container">

	<table class="table table-striped">
	<tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Jeu</th><th>Plateforme</th><th>Note</th></tr>
	<?php
	$comments = select_all("info_commentaires");

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $game = $att["nomJeu"];
	  $platform = $att["nomPlateforme"];
	  $comment = $att["commentaire"];
	  echo "<tr><td>$comment</td><td>$author</td><td>$date</td><td>$game</td><td>$platform</td><td>$mark</td></tr>\n";
	}?>

	</table>


      </div> 
    </div><!--consultation-commentaire-->
    
   <div class="tab-pane" id="consultation-categorie">
      <div class="container">
	<table class="table table-striped">
	  <tr><th>ID</th><th>Catégorie</th></tr>
	  <?php
	  $categories = select_all("categorie");
	  while($att = mysql_fetch_array($categories)){
	    $id = $att["idCategorie"];
	    $name = $att["nomCategorie"];
	    
	    echo "<tr><td>$id</td><td>$name</td></tr>\n";
	  }?>
	</table>
      </div> 
    </div><!--consultation-categorie-->


   <div class="tab-pane" id="consultation-plateforme">
      <div class="container">
	<?php
	$platforms = select_all("plateforme");
	?>
	<table class="table table-striped">
	  <tr><th>ID</th><th>Plateforme</th></tr>

	  <?php
	  while($att = mysql_fetch_array($platforms)){
	    $id = $att["idPlateforme"];
	    $name = $att["nomPlateforme"];
	  
	    echo "<tr><td>$id</td><td>$name</td></tr>\n";
	  }?>
	</table>
      </div> 
    </div><!--consultation-plateforme-->

    <div class="tab-pane" id="consultation-editeur">
      <div class="container">
	<?php
	$editors = select_all("editeur");
	?>
	
	<table class="table table-striped">
	  <tr><th>ID</th><th>Editeur</th></tr>
	  <?php
	  while($att = mysql_fetch_array($editors)){
	    $id = $att["idEditeur"];
	    $name = $att["nomEditeur"];
	    
	    echo "<tr><td>$id</td><td>$name</td></tr>\n";
	  }?>
	  
	</table>
      </div> 
    </div><!--consultation-editeur-->

    <div class="tab-pane" id="consultation-pouce">
      <div class="container">

	<?php
	$thumbs = select_all("pouce");
	?>
	<table class="table table-striped">
	<tr>Pseudo</th><th>Valeur</th><th>Commentaire (numéro)</th></tr>
	<?php
	while($att = mysql_fetch_array($thumbs)){
	  $idPouce = $att["idPouce"];
	  $value= $att["valeur"];
	  $author = $att["pseudo"];
	  $idComment = $att["idCommentaire"];
	  
	  echo "<tr><td>$author</td><td>$value</td><td>$idComment</td></tr>\n";
	}?>
	</table>
      </div> 
    </div><!--consultation-pouce-->
    
  </div> <!-- Tab panes -->

  <div id="result"></div>
  </div> <!-- Container -->
<script>
 $("#form-consultation1").submit(selection_games);
 $("#form-consultation2").submit(selection_comments);
 $("#form-consultation3").submit(selection_players);
</script>