<div class="container">
   <div class="well top-message">
   	<p>Cliquez sur les différents onglets pour accéder aux requêtes d'ajout.</p>
   	<ul>
		<li>Ajout d'un joueur,</li>
   		<li>Ajout d'un jeu.</li>
   	</ul>
   </div>

   <!-- Nav tabs -->
   <ul class="nav nav-tabs" id="myTab">
       <li><a href="#ajout1" data-toggle="tab">Ajout d'un joueur</a></li>
       <li><a href="#ajout2" data-toggle="tab">Ajout d'un jeu</a></li>
   </ul>

   <!-- Tab panes -->
   <div class="tab-content">

   <div class="tab-pane active" id="ajout1">
   	<div class="container">
<div id="result" class="alert alert-warning"></div>
	     <p class="lead">Ajout d'un joueur.</p>

   <form action="#" id="form-ajout1">
 	     	   <div class="form-group">
	     	   	<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Saisissez le pseudo du joueur à ajouter ici..">
	     	   </div>
		   <div class="form-group">
	     	   	<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" class="form-control" placeholder="Saisissez le nom du joueur à ajouter ici..">
	     	   </div>
		   <div class="form-group">
	     	   	<label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom" class="form-control" placeholder="Saisissez le prénom du joueur à ajouter ici..">
	     	   </div>
		   <div class="form-group">
		   	<label for="mail">Mail</label>
  		   	<div class="input-group">
			     <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
			     <input type="email" name="mail" id="mail" class="form-control" placeholder="Saisissez le mail du joueur à ajouter ici..">
			</div>
	     	   </div>
		   <div class="form-group">
	     	   	<label for="idCategorie">Catégorie de jeu préférée (numéro de la catégorie)</label>
			<input type="text" name="idCategorie" id="idCategorie" class="form-control" placeholder="Saisissez le numéro de la catégorie préférée du joueur à ajouter ici..">
	     	   </div>
		   <div class="form-group">
	     	   	<label for="idPlateforme">Plateforme de jeu préférée (numéro de la plateforme)</label>
			<input type="text" name="idPlateforme" id="idPlateforme" class="form-control" placeholder="Saisissez le numéro de la plateforme préférée du joueur à ajouter ici..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout1" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>
   
   <div class="tab-pane" id="ajout2">
      	<div class="container">
	     <p class="lead">Pour un joueur donné, la liste des commentaires se référant à un jeu dans sa catégorie préférée,<br />
	     disponible sur sa plateforme préférée.</p>
	     <form action="#" id="form-ajout2">
 	     	   <div class="form-group">
	     	   	<label for="pseudo">Pseudo du joueur</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Saisissez le pseudo ici..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout2" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>

   <div class="tab-pane" id="ajout3">
      	<div class="container">
	     <p class="lead">Pour un commentaire, la liste des joueurs qui l'ont apprécié.</p>
	     <form action="#" if="form-ajout3">
 	     	   <div class="form-group">
	     	   	<label for="idCommentaire">Numéro du commentaire</label>
			<input type="text" name="idCommentaire" id="idCommentaire" class="form-control" placeholder="Saisissez le numéro du commentaire ici..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout3" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>

   </div> <!-- Tab panes -->
</div> <!-- Container -->

<script>
   $("#form-ajout1").submit(add_player);
</script>
