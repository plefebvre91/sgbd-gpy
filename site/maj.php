<?php 
require_once("php/include.php"); 
require_once("php/selection.php");
db_connect();	
?>
<script src="js/update.js"></script>
<div class="container">
   <div class="well top-message">
   	<p>Cliquez sur les différents onglets pour accéder aux requêtes de mise à jour.</p>
   	<ul>
		<li>Mise à jour 1,</li>
		<li>Mise à jour 2,</li>
		<li>Mise à jour 3.</li>
   	</ul>
   </div>
   
   <!-- Nav tabs -->
   <ul class="nav nav-tabs" id="myTab">
       <li><a href="#majJoueur" data-toggle="tab">Joueur</a></li>
       <!-- <li><a href="#majJeu" data-toggle="tab">Jeu</a></li> -->
       <!-- <li><a href="#ajout3" data-toggle="tab">Editeur</a></li> -->
       <!-- <li><a href="#ajout4" data-toggle="tab">Plateforme</a></li> -->
       <!-- <li><a href="#ajout5" data-toggle="tab">Catégorie</a></li> -->
       <!-- <li><a href="#ajout6" data-toggle="tab">Appréciation</a></li> -->
       <!-- <li><a href="#ajout7" data-toggle="tab">Commentaire</a></li> -->
   </ul>
   
   <!-- Tab panes -->

   <div class="tab-content">

   <div class="tab-pane active" id="ajout1">
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
  echo "<input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control\" placeholder=\"Saisissez le nom du joueur à ajouter ici..\" value=\"$last_name\">";
  echo "</div><!--form-group Nom-->";

  echo "<div class=\"form-group\">";
  echo "<label>Prénom</label>";
  echo "<input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control\" placeholder=\"Saisissez le prénom du joueur à ajouter ici..\" value=\"$first_name\">";
  echo "</div><!--form-group Prénom-->";

  echo "<div class=\"form-group\">";
  echo "<label>Mail</label>";
  echo "<div class=\"input-group\">";
  echo "<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-envelope\"></span></span>";
  echo "<input type=\"email\" name=\"mail\" id=\"mail\" class=\"form-control\" placeholder=\"Saisissez le mail du joueur à ajouter ici..\" value=\"$mail\">";
  echo "</div>";
  echo "</div><!--form-group Mail-->";  

  echo "<div class=\"form-group\">";
  echo "<label>Plateforme de jeu préférée</label>";
  echo "<select name=\"nomPlateforme\" class=\"form-control\">";
  $platforms = select_all("plateforme");  
  while($options = mysql_fetch_array($platforms)) {
  	$name = $options["nomPlateForme"];
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

   </div><!-- tab-content -->
   
</div> <!-- container -->

<script>
$("form").submit(function(event){event.preventDefault();});
</script>