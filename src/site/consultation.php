<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes de consultation.</p>
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#consultation1" data-toggle="tab">Requête 1</a></li>
    <li><a href="#consultation2" data-toggle="tab">Requête 2</a></li>
    <li><a href="#consultation3" data-toggle="tab">Requête 3</a></li>
    <li><a href="#consultation-jeu" data-toggle="tab">Jeux</a></li>
    <li><a href="#consultation-joueur" data-toggle="tab">Joueurs</a></li>
    <li><a href="#consultation-categorie" data-toggle="tab">Catégories</a></li>
    <li><a href="#consultation-plateforme" data-toggle="tab">Plateformes</a></li>
    <li><a href="#consultation-editeur" data-toggle="tab">Éditeurs</a></li>		
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
	    <label>Sélectionnez une plateforme</label>
	    <div class="input-group">
	      <!-- Liste déroulante des plateformes -->
	      <select name="nomPlateforme" class="form-control">
		<?php
		$platforms = select_all("plateforme");  
		while ($options = mysql_fetch_array($platforms)) {
  		  $nomPlateforme = $options["nomPlateforme"];
		  echo "<option value=\"$nomPlateforme\">$nomPlateforme</option>";
		}
		?>
	      </select>
	      <!-- Fin de : Liste déroulante des plateformes -->
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
	    <label>Sélectionnez un joueur</label>
	    <div class="input-group">
	      <!-- Liste déroulante des pseudos -->
	      <select name="pseudo" class="form-control">
		<?php
		$players = select_all("joueur");  
		while ($options = mysql_fetch_array($players)) {
  		  $pseudo = $options["pseudo"];
		  echo "<option value=\"$pseudo\">$pseudo</option>";
		}
		?>
	      </select>
	      <!-- Fin de : Liste déroulante des pseudos -->
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
	    <label>Sélectionnez un commentaire</label>
	    <div class="input-group">
	      <!-- Liste déroulante des commentaires -->
	      <select name="idCommentaire" class="form-control">
		<?php
		$comments = select_all("commentaire");  
		while ($options = mysql_fetch_array($comments)) {
  		  $idCommentaire = $options["idCommentaire"];
		  $commentaire = $options["commentaire"];
		  echo "<option value=\"$idCommentaire\">Commentaire $idCommentaire - $commentaire</option>";
		}
		?>
	      </select>
	      <!-- Fin de : Liste déroulante des commentaires -->   
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
	<?php
	$games = select_all("jeu");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Nom</th><th>&Eacute;diteur</th><th>Plateforme</th><th>Catégorie</th></tr>
	  <?php
	  while($att = mysql_fetch_array($games)) {
	    $id = $att["idJeu"];
	    $name = $att["nomJeu"];
	    $categories = get_game_categories($id);
	    $platforms = get_game_platforms($id);
	    echo "<tr><td>$id</td><td>$name</td><td>$platforms</td><td>$categories</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-jeu-->

    <div class="tab-pane" id="consultation-joueur">
      <div class="container">
	<?php
	$players = select_all("info_joueur");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Pseudo</th><th>Nom</th><th>Prénom</th><th>Adresse mail</th><th>Plateforme préférée</th><th>Catégorie préférée</th></tr>
	  <?php
	  while($att = mysql_fetch_array($players)) {
	    $id = $att["pseudo"];
	    $last_name = $att["nom"];
	    $first_name = $att["prenom"];
	    $mail = $att["mail"];
	    $category = $att["nomCategorie"];
	    $platform = $att["nomPlateforme"];
	    echo "<tr><td>$id</td><td>$last_name</td><td>$first_name</td><td>$mail</td><td>$platform</td><td>$category</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-joueur-->

    <div class="tab-pane" id="consultation-commentaire">
      <div class="container">
	<?php
	$comments = select_all("info_commentaires");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Jeu</th><th>Plateforme</th><th>Note</th></tr>
	  <?php
	  while($att = mysql_fetch_array($comments)) {
	    $id = $att["idCommentaire"];
	    $mark = $att["note"];
	    $author = $att["pseudo"];
	    $date = $att["dateCommentaire"];
	    $game = $att["nomJeu"];
	    $platform = $att["nomPlateforme"];
	    $comment = $att["commentaire"];
	    echo "<tr><td>$comment</td><td>$author</td><td>$date</td><td>$game</td><td>$platform</td><td>$mark</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-commentaire-->
    
    <div class="tab-pane" id="consultation-categorie">
      <div class="container">
	<?php
	$categories = select_all("categorie");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Catégories</th></tr>
	  <?php
	  while($att = mysql_fetch_array($categories)) {
	    $name = $att["nomCategorie"];
	    echo "<tr><td>$name</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-categorie-->

    <div class="tab-pane" id="consultation-plateforme">
      <div class="container">
	<?php
	$platforms = select_all("plateforme");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Plateformes</th></tr>
	  <?php
	  while($att = mysql_fetch_array($platforms)) {
	    $name = $att["nomPlateforme"];
	    echo "<tr><td>$name</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-plateforme-->

    <div class="tab-pane" id="consultation-editeur">
      <div class="container">
	<?php
	$editors = select_all("editeur");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Éditeurs</th></tr>
	  <?php
	  while($att = mysql_fetch_array($editors)) {
	    $name = $att["nomEditeur"];
	    echo "<tr><td>$name</td></tr>\n";
	  }
	  ?>
	</table>
      </div> 
    </div><!--consultation-editeur-->

    <div class="tab-pane" id="consultation-pouce">
      <div class="container">
	<?php
	$thumbs = select_all("pouce");
	?>
	<table class="table table-hover">
	  <tr class="active"><th>Pseudo</th><th>Valeur</th><th>Commentaire</th><th>Jeu</th><th>Plateforme</th><th>Note</th></tr>
	  <?php
	  while($att = mysql_fetch_array($thumbs)) {
	    $idPouce = $att["idPouce"];
	    $value= $att["valeur"];
	    $author = $att["pseudo"];
	    $idCommentaire = $att["idCommentaire"];
	    // Utilisation de la vue info_commentaires pour récupérer les informations du commentaire
	    $commentInfos = select_all("info_commentaires where idCommentaire = '$idCommentaire'");
	    $commentInfos = mysql_fetch_array($commentInfos);
	    $commentaire = $commentInfos["commentaire"];
	    $nomJeu = $commentInfos["nomJeu"];
	    $nomPlateforme = $commentInfos["nomPlateforme"];
	    $note = $commentInfos["note"];
	    echo "<tr><td>$author</td><td>$value</td><td>$commentaire</td><td>$nomJeu</td><td>$nomPlateforme</td><td>$note</td></tr>\n";
	  }
	  ?>
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
 $("a[data-toggle^='tab']").click(function(){$("#result").html("");});
</script>