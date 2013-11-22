<div class="container">
   <div class="well top-message">
   <p>Cliquez sur les différents onglets pour accéder aux requêtes de consultation.</p>

   <ul>
	<li>L'ensemble des jeux critiqués disponibles sur une plateforme donnée, classés par catégorie,</li>
	<li>Pour un joueur donné, la liste des commentaires se référant à un jeu dans sa catégorie préférée, disponible sur sa plateforme préférée,</li>
	<li>Pour un commentaire, la liste des joueurs qui l'ont apprécié.</li>
   </ul>
   </div>

   <!-- Nav tabs -->
   <ul class="nav nav-tabs" id="myTab">
       <li><a href="#consultation1" data-toggle="tab">Requête 1</a></li>
       <li><a href="#consultation2" data-toggle="tab">Requête 2</a></li>
       <li><a href="#consultation3" data-toggle="tab">Requête 3</a></li>
       <li><a href="#consultation-jeu" data-toggle="tab">Jeux</a></li>
       <li><a href="#consultation-joueur" data-toggle="tab">Joueurs</a></li>
       <li><a href="#consultation-commentaire" data-toggle="tab">Commentaires</a></li>
       <li><a href="#consultation-pouce" data-toggle="tab">Pouces</a></li>
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

<?php
  $games = select_all("jeu");

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Nom</th><th>&Eacute;diteur</th><th>Plateforme</th><th>Catégorie</th></tr>";

while($att = mysql_fetch_array($games)){
  $id = $att["idJeu"];
  $name = $att["nomJeu"];
  
  echo "<tr>
        <td>$id</td>
        <td>$name</td>
	</tr>\n";
}

echo "</table>";
?>

	</div> 
   </div><!--consultation-jeu-->
   
   </div> <!-- Tab panes -->

   <div id="result"></div>
   
</div> <!-- Container -->
<script>
   $("#form-consultation1").submit(selection_games);
   $("#form-consultation2").submit(selection_comments);
   $("#form-consultation3").submit(selection_players);
</script>
