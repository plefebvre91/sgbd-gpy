<script src="js/delete.js"></script>
<div class="alert alert-info" id="result"></div>

<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux trois requêtes de supression.</p>

  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#consultation1" data-toggle="tab">Commentaires</a></li>
    <li><a href="#consultation2" data-toggle="tab">Jeux</a></li>
    <li><a href="#consultation3" data-toggle="tab">Joueurs</a></li>
    <li><a href="#consultation4" data-toggle="tab">Editeurs</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="consultation1">
      <div class="container">
	
	<?php
	$comments = select_all("commentaire");

	echo "<table class=\"table table-striped\">";
	echo "<tr><th>Commentaire</th>";
	echo "<th>Auteur</th>";
	echo "<th>Date</th>";
	echo "<th>Note</th>";
	echo "<th>Suppression</th></tr>";

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $comment = substr($att["commentaire"], 0, 137)."...";

	  
	  echo "<tr id=\"comment$id\">";
	  echo "<td>$comment</td>";
	  echo "<td>$author</td>";
	  echo "<td>$date</td>";
	  echo "<td>$mark</td>";
	  echo "<td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_comment($id);\">Supprimer</button></td></tr>";
	}

	echo "</table>";?>
      </div> 
    </div>
    
    <div class="tab-pane" id="consultation2">
      <div class="container">

	<?php
	//$games = select_all("jeu");
	$games = mysql_query("SELECT * FROM jeu INNER JOINN plateforme");
	echo "<table class=\"table table-striped\">";
	echo "<tr><th>Jeu</th><th>Suppression</th></tr>";

	while($att = mysql_fetch_array($games)){
	  $id_game = $att["idJeu"];
	  $name= $att["nomJeu"];
	  $platform = $att["nomPlateforme"];
	  $id_platform = $att["idPlateforme"];
	  
	  echo "<tr id=\"game$id\">        <td>$name</td>        <td>$platform</td>
        <td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_game($id_game, $id_platform);\">Supprimer</button></td></tr>\n";
	}

	echo "</table>"; ?>


      </div> 
    </div>

    <div class="tab-pane" id="consultation3">
      <div class="container">
	<?php
	$players = select_all("joueur");

	echo "<table class=\"table table-striped\">";
	echo "<tr><th>Pseudo</th><th>Nom</th><th>Prenom</th><th>Adresse mail</th></tr>";

	while($att = mysql_fetch_array($players)){
	  $id = $att["pseudo"];
	  $last_name = $att["nom"];
	  $first_name = $att["prenom"];
	  $mail = $att["mail"];

	  echo "<tr id=\"$id\">
        <td>$id</td><td>$last_name</td><td>$first_name</td><td>$mail</td><td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_player('$id');\">Supprimer</button></td></tr>\n";
	}

	echo "</table>";?>


      </div> 
    </div>
    
    <div class="tab-pane" id="consultation4">
      <div class="container">
	<?php
	$editors = select_all("editeur");

	echo "<table class=\"table table-striped\">";
	echo "<tr><th>ID</th><th>Editeur</th><th>Suppression</th></tr>";

	while($att = mysql_fetch_array($editors)){
	  $id = $att["idEditeur"];
	  $editor = $att["nomEditeur"];
	  
	  echo "<tr id=\"editor$id\">
        <td>$id</td><td>$editor</td><td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_editor($id);\">Supprimer</button></td></tr>\n";
	}

	echo "</table>";

	
	?>
	
      </div> 
    </div>

  </div> <!-- Tab panes -->

  
</div> <!-- Container -->
