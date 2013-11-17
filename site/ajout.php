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
       <li><a href="#ajout2" data-toggle="tab">Ajout ...</a></li>
       <li><a href="#ajout3" data-toggle="tab">Ajout d'un editeur</a></li>
       <li><a href="#ajout4" data-toggle="tab">Ajout d'une plateforme</a></li>
     <li><a href="#ajout5" data-toggle="tab">Ajout d'une catégorie</a></li>
   </ul>

   <!-- Tab panes -->
<div id="result" class="alert alert-warning"></div>
   <div class="tab-content">

   <div class="tab-pane active" id="ajout1">
   	<div class="container">

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
<!-- AJOUT EDITEUR -->
   <div class="tab-pane" id="ajout3">
      	<div class="container">
	     <p class="lead">Ajouter un éditeur</p>
	     <form action="#" id="form-ajout3">
 	     	   <div class="form-group">
	     	   	<label for="nomEditeur">Nom de l'éditeur</label>
			<input type="text" name="nomEditeur" id="nomEditeur" class="form-control" placeholder="Saisissez le nom de l'éditeur..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout3" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>


   <div class="tab-pane" id="ajout4">
      	<div class="container">
	     <p class="lead">Ajouter une plateforme</p>
	     <form action="#" id="form-ajout4">
 	     	   <div class="form-group">
	     	   	<label for="nomPlateforme">Nom de la plateforme</label>
			<input type="text" name="nomPlateforme" id="nomPlateforme" class="form-control" placeholder="Saisissez le nom de plateforme..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout4" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>

   <div class="tab-pane" id="ajout5">
      	<div class="container">
	     <p class="lead">Ajouter une catégorie</p>
	     <form action="#" id="form-ajout5">
 	     	   <div class="form-group">
	     	   	<label for="nomCategorie">Nom de la categorie</label>
			<input type="text" name="nomCategorie" id="nomCategorie" class="form-control" placeholder="Saisissez le nom de catégorie..">
	     	   </div>
	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout5" value="Envoyer la requête">
	     	   </div>
	     </form>
	</div> 
   </div>



   </div> <!-- Tab panes -->
</div> <!-- Container -->

<script>
   $("#form-ajout1").submit(add_player);

   $("#form-ajout3").submit(add_editor);
   $("#form-ajout4").submit(add_platform);
   $("#form-ajout5").submit(add_category);
</script>
