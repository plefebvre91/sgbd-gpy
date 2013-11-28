<?php 
require_once("php/include.php"); 
require_once("php/selection.php");
db_connect();	
?>
<script src="js/update.js"></script>
<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes de mise à jour.</p>
  </div>
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#maj-joueur" data-toggle="tab">Joueur</a></li>
    <li><a href="#maj-jeu" data-toggle="tab">Jeu</a></li>
    <li><a href="#maj-commentaire" data-toggle="tab">Commentaire</a></li>
  </ul>
  
  <!-- Tab panes -->

  <div class="tab-content">
    
    <!-- MAJ JOUEUR-->
    <div class="tab-pane active" id="maj-joueur">
      <div class="container">

	<p class="lead">Mise à jour d'un joueur.</p>

	<?php
	$players = select_all("joueur");

	echo "<div class=\"panel-group\" id=\"accordion\">";

	while ($att = mysql_fetch_array($players)) {
	  $id = $att["pseudo"];
	  $last_name = $att["nom"];
	  $first_name = $att["prenom"];
	  $mail = $att["mail"];
	  $idPlateforme = $att["idPlateforme"];
	  $idCategorie = $att["idCategorie"];
	  
	  echo "<div class=\"panel panel-default\">";
	  echo "<div class=\"panel-heading\">";
	  echo "<h4 class=\"panel-title\">";
	  echo "<a id=\"result-$id\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse-$id\">$id</a>";
	  echo "</h4>";
	  echo "</div><!--panel-heading-->"; 
	  echo "<div id=\"collapse-$id\" class=\"panel-collapse collapse\">";
	  echo "<div class=\"panel-body\">";
	  
	  echo "<form action=\"#\" id=\"form-maj-$id\">";

	  echo "<div class=\"form-group\">";
	  echo "<label>Nom</label>";
	  echo "<input type=\"text\" name=\"nom\" class=\"form-control\" placeholder=\"Saisissez le nom du joueur à ajouter ici..\" value=\"$last_name\">";
	  echo "</div><!--form-group Nom-->";

	  echo "<div class=\"form-group\">";
	  echo "<label>Prénom</label>";
	  echo "<input type=\"text\" name=\"prenom\" class=\"form-control\" placeholder=\"Saisissez le prénom du joueur à ajouter ici..\" value=\"$first_name\">";
	  echo "</div><!--form-group Prénom-->";

	  echo "<div class=\"form-group\">";
	  echo "<label>Mail</label>";
	  echo "<div class=\"input-group\">";
	  echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-envelope\"></span></span>";
	  echo "<input type=\"email\" name=\"mail\" class=\"form-control\" placeholder=\"Saisissez le mail du joueur à ajouter ici..\" value=\"$mail\">";
	  echo "</div>";
	  echo "</div><!--form-group Mail-->";  

	  echo "<div class=\"form-group\">";
	  echo "<label>Plateforme de jeu préférée</label>";
	  echo "<select name=\"nomPlateforme\" class=\"form-control\">";
	  $platforms = select_all("plateforme");  
	  while($options = mysql_fetch_array($platforms)) {
  	    $name = $options["nomPlateforme"];
	    if ($options["idPlateforme"] == $idPlateforme) {
	      echo "<option value=\"$name\" selected>$name</option>";
	    }
	    else {
	      echo "<option value=\"$name\">$name</option>";
	    }
	  }
	  echo "</select>";
	  echo "</div><!--form-group nomPlateforme-->";

	  echo "<div class=\"form-group\">";
	  echo "<label>Catégorie de jeu préférée</label>";
	  echo "<select name=\"nomCategorie\" class=\"form-control\">";
	  $categories = select_all("categorie");  
	  while($options = mysql_fetch_array($categories)) {
  	    $name = $options["nomCategorie"];
	    if ($options["idCategorie"] == $idCategorie) {
	      echo "<option value=\"$name\" selected>$name</option>";
	    }
	    else {
	      echo "<option value=\"$name\">$name</option>";
	    }
	  }
	  echo "</select>";
	  echo "</div><!--form-group nomCategorie-->";

	  echo "<div class=\"form-group text-center\">";
	  echo "<input type=\"submit\" class=\"btn btn-warning btn-lg\" value=\"Envoyer la requête\" onclick=\"javascript:update_player('$id');\">";
	  echo "</div><!--form-group Bouton-->";

	  echo "</form><!--form-maj-$id-->";
	  echo "</div><!--panel-body-->";

	  echo "</div><!--collapse-$id-->";
	  echo "</div><!--panel panel-default-->";
	}

	echo "</div><!--panel-group-->";
	;?>

      </div>
    </div><!-- MAJ JOUEUR-->

    <!-- MAJ JEU-->
    <div class="tab-pane" id="maj-jeu">
      <div class="container">

	<p class="lead">Mise à jour d'un jeu.</p>

	<?php
	$games = select_all("jeu");

	echo "<div class=\"panel-group\" id=\"accordion\">";

	while ($att = mysql_fetch_array($games)) {
	  $idJeu = $att["idJeu"];
	  $nomJeu = $att["nomJeu"];
	  $idEditeur = $att["idEditeur"];
	  
	  echo "<div class=\"panel panel-default\">";
	  echo "<div class=\"panel-heading\">";
	  echo "<h4 class=\"panel-title\">";
	  echo "<a id=\"result-jeu-$idJeu\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse-jeu-$idJeu\">$nomJeu</a>";
	  echo "</h4>";
	  echo "</div><!--panel-heading-->"; 
	  echo "<div id=\"collapse-jeu-$idJeu\" class=\"panel-collapse collapse\">";
	  echo "<div class=\"panel-body\">";
	  
	  echo "<form action=\"#\" id=\"form-maj-jeu-$idJeu\">";

	  echo "<div class=\"form-group\">";
	  echo "<label>Nom</label>";
	  echo "<input type=\"text\" name=\"nomJeu\" id=\"nom\" class=\"form-control\" placeholder=\"Saisissez le nom du jeu à ajouter ici..\" value=\"$nomJeu\">";
	  echo "</div><!--form-group Nom-->";

	  echo "<div class=\"form-group\">";

	  echo "<!-- Liste déroulante des noms d'éditeurs -->";
	  echo "<label>&Eacute;diteur du jeu</label>";
	  echo "<select name=\"idEditeur\" class=\"form-control\">";
	  $editors = select_all("editeur");  
	  while ($options = mysql_fetch_array($editors)) {
	    $idEditeur = $options["idEditeur"];
  	    $nomEditeur = $options["nomEditeur"];
	    echo "<option value=\"$idEditeur\">$nomEditeur</option>";
	  }
	  echo "</select>";
	  echo "<!-- Fin de : Liste déroulante des noms d'éditeurs -->";
	  echo "</div><!--form-group Editeur-->";


	  



	  echo "<div class=\"form-group text-center\">";
	  echo "<input type=\"submit\" class=\"btn btn-warning btn-lg\" value=\"Envoyer la requête\" onclick=\"javascript:update_game('$idJeu');\">";
	  echo "</div><!--form-group Bouton-->";

	  echo "</form><!--form-maj-jeu-$idJeu-->";
	  echo "</div><!--panel-body-->";

	  echo "</div><!--collapse-jeu-$idJeu-->";
	  echo "</div><!--panel panel-default-->";
	}

	echo "</div><!--panel-group-->";
	;?>

      </div>
    </div><!-- MAJ JEU-->


    <!-- MAJ COMMENTAIRE-->
    <div class="tab-pane" id="maj-commentaire">
      <div class="container">

	<p class="lead">Mise à jour d'un commentaire.</p>

	<?php
	$comments = select_all("commentaire");

	echo "<div class=\"panel-group\" id=\"accordion\">";

	while ($att = mysql_fetch_array($comments)) {
	  $idCommentaire = $att["idCommentaire"];
	  $note = $att["note"];
	  $commentaire = $att["commentaire"];
	  $dateCommentaire = $att["dateCommentaire"];
	  $pseudo = $att["pseudo"];
	  $idJeu = $att["idJeu"];
	  $idPlateforme = $att["idPlateforme"];
	  
	  echo "<div class=\"panel panel-default\">";
	  echo "<div class=\"panel-heading\">";
	  echo "<h4 class=\"panel-title\">";
	  echo "<a id=\"result-commentaire-$idCommentaire\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse-commentaire-$idCommentaire\">Commentaire $idCommentaire - $commentaire</a>";
	  echo "</h4>";
	  echo "</div><!--panel-heading-->"; 
	  echo "<div id=\"collapse-commentaire-$idCommentaire\" class=\"panel-collapse collapse\">";
	  echo "<div class=\"panel-body\">";
	  
	  echo "<form action=\"#\" id=\"form-maj-commentaire-$idCommentaire\">";
	  echo "<div class=\"form-group\">";
	  echo "<label for=\"note\">Note</label>";
	  echo "<input name=\"note\" id=\"note\" type=\"number\" class=\"form-control\" step=\"1\" value=\"$note\" min=\"0\" max=\"20\">";
	  echo "</div>";

	  echo "<div class=\"form-group\">";
	  echo "<label for=\"commentaire\">Commentaire</label>";
	  echo "<input type=\"text\" name=\"commentaire\" id=\"commentaire\" class=\"form-control\" value=\"$commentaire\"placeholder=\"Saisissez le commentaire ici..\">";
	  echo "</div>";

	  echo "<div class=\"form-group\">";
	  echo "<!-- Liste déroulante des pseudos -->";
	  echo "<label>Auteur</label>";
	  echo "<select name=\"pseudo\" class=\"form-control\">";
	  $players = select_all("joueur");  
	  while ($options = mysql_fetch_array($players)) {
  	    $pseudoOption = $options["pseudo"];
	    if ($pseudoOption == $pseudo) {
	      echo "<option value=\"$pseudoOption\" selected>$pseudoOption</option>";
	    }
	    else {
	      echo "<option value=\"$pseudoOption\">$pseudoOption</option>";
	    }
	  }
	  echo "</select>";
	  echo "<!-- Fin de : Liste déroulante des pseudos -->";
	  echo "</div>";
	  
	  echo "<div class=\"form-group\">";
	  echo "<!-- Liste déroulante des noms de jeux -->";
	  echo "<label>Nom du jeu à commenter</label>";
	  echo "<select name=\"idJeu\" class=\"form-control\">";
	  $games = select_all("jeu");  
	  while ($options = mysql_fetch_array($games)) {
  	    $name = $options["nomJeu"];
	    $id = $options["idJeu"];

	    if ($id == $idJeu) {
	      echo "<option value=\"$id\" selected>$name</option>";
	    }
	    else {
	      echo "<option value=\"$id\">$name</option>";
	    }
	  }
	  echo "</select>";
	  echo "<!-- Fin de : Liste déroulante des noms de jeux -->";
	  echo "</div>";

	  echo "<div class=\"form-group\">";
	  echo "<!-- Liste déroulante des plateformes -->";
	  echo "<label>Plateforme du jeu</label>";
	  echo "<select name=\"idPlateforme\" class=\"form-control\">";
	  $platforms = select_all("plateforme");  
	  while ($options = mysql_fetch_array($platforms)) {
  	    $name = $options["nomPlateforme"];
	    $id = $options["idPlateforme"];

	    if ($id == $idPlateforme) {
	      echo "<option value=\"$id\" selected>$name</option>";
	    }
	    else {
	      echo "<option value=\"$id\">$name</option>";
	    }
	  }
	  echo "</select>";
	  echo "<!-- Fin de : Liste déroulante des plateformes-->";
	  echo "</div>";

	  echo "<div class=\"form-group text-center\">";
	  echo "<input type=\"submit\" class=\"btn btn-warning btn-lg\" value=\"Envoyer la requête\" onclick=\"javascript:update_comment('$idCommentaire');\">";
	  echo "</div><!--form-group Bouton-->";

	  echo "</form><!--form-maj-commentaire-$idCommentaire-->";
	  echo "</div><!--panel-body-->";

	  echo "</div><!--collapse-commentaire-$idCommentaire-->";
	  echo "</div><!--panel panel-default-->";
	}

	echo "</div><!--panel-group-->";
	;?>

      </div>
    </div><!-- MAJ COMMENTAIRE-->
    
  </div><!-- tab-content -->
  
</div> <!-- container -->

<script>
 $("form").submit(function(event){event.preventDefault();});
</script>
