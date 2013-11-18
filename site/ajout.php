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
       <li><a href="#ajout1" data-toggle="tab">Joueur</a></li>
       <li><a href="#ajout2" data-toggle="tab">Jeu</a></li>
       <li><a href="#ajout3" data-toggle="tab">Editeur</a></li>
       <li><a href="#ajout4" data-toggle="tab">Plateforme</a></li>
     <li><a href="#ajout5" data-toggle="tab">Catégorie</a></li>
     <li><a href="#ajout6" data-toggle="tab">Appréciation</a></li>
     <li><a href="#ajout7" data-toggle="tab">Commentaire</a></li>
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
     	     <p class="lead">Ajout d'un jeu.</p>

	     <form action="#" id="form-ajout2">
	      	   <div class="form-group">
	     	   	<label for="nomJeu">Nom du jeu</label>
			<input type="text" name="nomJeu" id="nomJeu" class="form-control" placeholder="Saisissez le nom du jeu à ajouter ici..">
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


<!--- AJOUT POUCE -->
   <div class="tab-pane active" id="ajout6">
   	<div class="container">

	     <p class="lead">Ajout d'une appréciation de commentaire</p>
<?php
  require("php/include.php");
  require("php/selection.php");
  db_connect();
  $comments = select_comments();

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Commentaire</th>";
  echo "<th>Auteur</th>";
  echo "<th>Date</th>";
  echo "<th>Note</th>";
  echo "<th align=\"center\">Appreciation</th></tr>";

  while($att = mysql_fetch_array($comments)){
    $id = $att["idCommentaire"];
    $mark = $att["note"];
    $author = $att["pseudo"];
    $date = $att["dateCommentaire"];
    $comment = $att["commentaire"];

  
   echo "<tr id=\"comment$id\">";
   echo "<td>$comment</td>";
   echo "<td>$author</td>";
   echo "<td>$date</td>";
   echo "<td>$mark</td>";
   echo "<td align=\"center\"><button class=\"btn btn-success btn-xs\" onclick=\"javascript:add_inch($id, '+');\">+</button>&nbsp;";
   echo "<button class=\"btn btn-danger btn-xs\" onclick=\"javascript:add_inch($id, '-');\">-</button></td></tr>";
}

echo "</table>";?>
	</div> 
   </div>

<!-- AJOUT COMMENTAIRE -->
   <div class="tab-pane active" id="ajout7">
   	<div class="container">

	     <p class="lead">Ajout d'un commentaire.</p>

   <form action="#" id="form-ajout7">

 	     	   <div class="form-group">
	     	   	<label for="note">Note</label>
			<input type="text" name="note" id="note" class="form-control" placeholder="Saisissez la note...">
	     	   </div>


 	     	   <div class="form-group">
	     	   	<label for="commentaire">Commentaire</label>
			<input type="text" name="commentaire" id="commentaire" class="form-control" placeholder="Saisissez le commentaire du joueur à ajouter ici..">
	     	   </div>



		   <div class="form-group">
	     	   	<label for="pseudo">Auteur</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Saisissez le pseudo...">
	     	   </div>

   
		   <div class="form-group">
	     	   	<label for="idJeu">Jeu</label>
			<input type="text" name="idJeu" id="idJeu" class="form-control" placeholder="Saisissez le jeu concerné (ID)...">
	     	   </div>

   
		   <div class="form-group">
	     	   	<label for="idPlateforme">Jeu</label>
			<input type="text" name="idPlateforme" id="idPlateforme" class="form-control" placeholder="Saisissez la plateforme concerné (ID)...">
	     	   </div>

	     	   <div class="form-group text-center">
	    	    	<input type="submit" class="btn btn-warning btn-lg" id="btn-ajout6" value="Envoyer la requête">
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
   $("#form-ajout6").submit(add_inch);
   $("#form-ajout7").submit(add_comment);
</script>
