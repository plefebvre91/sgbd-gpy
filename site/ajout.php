<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes d'ajout.</p>
    <ul>
      <li>Ajout d'un joueur,</li>
      <li>Ajout d'un jeu,</li>
      <li>Ajout d'un éditeur,</li>
      <li>Ajout d'une plateforme,</li>
      <li>Ajout d'une catégorie,</li>
      <li>Ajout d'une appréciation de commentaire,</li>
      <li>Ajout d'un commentaire.</li>
    </ul>
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#ajout1" data-toggle="tab">Joueur</a></li>
    <li><a href="#ajout2" data-toggle="tab">Jeu</a></li>
    <li><a href="#ajout3" data-toggle="tab">Editeur</a></li>
    <li><a href="#ajout4" data-toggle="tab">Plateforme</a></li>
    <li><a href="#ajout5" data-toggle="tab">Catégorie</a></li>
    <li><a href="#ajout6" data-toggle="tab">Appréciation de commentaire</a></li>
    <li><a href="#ajout7" data-toggle="tab">Commentaire</a></li>
  </ul>

  <!-- Tab panes -->
  <div id="result" class="alert alert-warning"></div>
  <div class="tab-content">

    <div class="tab-pane active" id="ajout1">
      <div class="container">

	<p class="lead">Ajouter un joueur</p>

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
	    <label>Catégorie de jeu préférée</label>
	    <!-- Liste déroulante des catégories de jeu -->
	    <select name="idCategorie" class="form-control">
	      <?php
	      $category = select_all("categorie");  
	      while ($options = mysql_fetch_array($category)) {
  		$name = $options["nomCategorie"];
		$id = $options["idCategorie"];
		echo "<option value=\"$id\">$name</option>";
	      }
	      ;?>
	    </select>
	    <!-- Fin de : Liste déroulante des catégories de jeu -->   
	  </div>
	  <div class="form-group">
	    <label>Plateforme de jeu préférée</label>
	    <!-- Liste déroulante des plateformes -->
	    <select name="idPlateforme" class="form-control">
	      <?php
	      $platform = select_all("plateforme");  
	      while ($options = mysql_fetch_array($platform)) {
  		$name = $options["nomPlateForme"];
		$id = $options["idPlateforme"];
		echo "<option value=\"$id\">$name</option>";
	      }
	      ;?>
	    </select>
	    <!-- Fin de : Liste déroulante des plateformes -->   
	  </div>
	  <div class="form-group text-center">
	    <input type="submit" class="btn btn-warning btn-lg" id="btn-ajout1" value="Envoyer la requête">
	  </div>
	</form>
      </div> 
    </div>

    <!--- AJOUT JEU -->    
    <div class="tab-pane" id="ajout2">
      <div class="container">
     	<p class="lead">Ajouter un jeu</p>

	<form action="#" id="form-ajout2">
	  <div class="form-group">
	    <label for="nomJeu">Nom du jeu</label>
	    <input type="text" name="nomJeu" id="nomJeu" class="form-control" placeholder="Saisissez le nom du jeu à ajouter ici..">
	  </div>
	  <div class="form-group">
	    <!-- Façon en demandant de saisir l'idEditeur -->   
	    <!--<label for="idEditeur">&Eacute;diteur du jeu</label>-->
	    <!--<input type="text" name="idEditeur" id="idEditeur" class="form-control" placeholder="Saisissez le numéro de l'éditeur du jeu à ajouter ici..">-->
	    <!-- Façon avec liste déroulante des noms d'éditeurs -->
	    <label>&Eacute;diteur du jeu</label>
	    <select name="nomEditeur" class="form-control">
	      <?php
	      $editors = select_all("editeur");  
	      while ($options = mysql_fetch_array($editors)) {
  		$name = $options["nomEditeur"];
		echo "<option value=\"$name\">$name</option>";
	      }
	      ;?>
	    </select>
	    <!-- Fin de : Façon avec liste déroulante des noms d'éditeurs -->   
	  </div>

	  <div class="form-group">
   	    <!-- Façon en demandant de saisir un unique idPlateforme -->   
	    <!--<label for="idPlateforme">Plateforme</label>-->
	    <!--<input type="text" name="idPlateforme" id="idPlateforme" class="form-control" placeholder="Saisissez le numéro de la plateforme du jeu à ajouter ici..">-->
	    <!-- Façon avec cases à chocher des noms de plateformes -->
	    <label>Plateforme</label>
	    <p class="help-block">Cochez la (les) case(s) correspondant aux plateformes sur laquelle le jeu est disponible.</p>
	    <?php
	    $platforms = select_all("plateforme");  
	    while ($boxes = mysql_fetch_array($platforms)) {
  	      $name = $boxes["nomPlateForme"];
	      $id = $boxes["idPlateforme"];
	      echo "<div class=\"checkbox\">";
	      echo "  <label><input type=\"checkbox\" name=\"idPlateforme[]\" value=\"$id\">$name</label>";
	      echo "</div>\n";
	    }
	    ;?>
	    <!-- Fin de : Façon avec cases à chocher des noms de plateformes -->   
	  </div>
	  <div class="form-group">
	    <!-- Cases à chocher des noms de catégories -->
	    <label>Catégorie</label>
	    <p class="help-block">Cochez la (les) case(s) correspondant aux catégories à laquelle le jeu appartient.</p>
	    <?php
	    $categories = select_all("categorie");  
	    while ($boxes = mysql_fetch_array($categories)) {
  	      $name = $boxes["nomCategorie"];
	      $id = $boxes["idCategorie"];
	      echo "<div class=\"checkbox\">";
	      echo "  <label><input type=\"checkbox\" name=\"idCategorie[]\" value=\"$id\">$name</label>";
	      echo "</div>\n";
	    }
	    ;?>
	    <!-- Fin de : Cases à chocher des noms de catégories -->   
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
    <div class="tab-pane" id="ajout6">
      <div class="container">

	<p class="lead">Ajouter une appréciation de commentaire</p>
	<?php
	$comments = select_all("commentaire");

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
    <div class="tab-pane" id="ajout7">
      <div class="container">

	<p class="lead">Ajouter un commentaire</p>

	<form action="#" id="form-ajout7">
    	  <div class="form-group">
	    <label for="note">Note</label>
	    <input name="note" id="note" type="number" class="form-control" step="1" value="10" min="0" max="20">
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
	    <label for="idPlateforme">Plateforme</label>
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
 $("#form-ajout2").submit(add_game);
 $("#form-ajout3").submit(add_editor);
 $("#form-ajout4").submit(add_platform);
 $("#form-ajout5").submit(add_category);
 $("#form-ajout6").submit(add_inch);
 $("#form-ajout7").submit(add_comment);
</script>
