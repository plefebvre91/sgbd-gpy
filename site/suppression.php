<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes de suppression.</p>

  </div>

  <div class="alert alert-info" id="result"></div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#consultation1" data-toggle="tab">Commentaires</a></li>
    <li><a href="#consultation2" data-toggle="tab">Jeux</a></li>
    <li><a href="#consultation3" data-toggle="tab">Joueurs</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="consultation1">
      <div class="container">
	<table class="table table-striped">
	  <tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Jeu</th><th>Plateforme</th><th>Note</th><th>Suppression</th></tr>
	<?php
	$comments = select_all("info_commentaires");

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $game = $att["nomJeu"];
	  $platform = $att["nomPlateforme"];
	  $comment = substr($att["commentaire"], 0, 137)."...";


	  echo "<tr id=\"comment$id\"><td>$comment</td><td>$author</td><td>$date</td><td>$game</td><td>$platform</td><td>$mark</td>";
	  echo "<td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_comment($id);\">Supprimer</button></td></tr>\n";
	}?>
	</table>
      </div> 
    </div>
    
    <div class="tab-pane" id="consultation2">
      <div class="container">

	<table class="table table-striped">
	  <tr><th>Jeu</th><th>Plateforme</th><th>Suppression</th></tr>
	<?php
	//$games = select_all("jeu");
	$games = mysql_query("SELECT * FROM ((jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu) INNER JOIN plateforme ON plateforme.idPlateforme = estDisponible.idPlateforme) order by nomJeu, nomPlateforme");

	while($att = mysql_fetch_array($games)){
	  $id_game = $att["idJeu"];
	  $name= $att["nomJeu"];
	  $platform = $att["nomPlateforme"];
	  $id_platform = $att["idPlateforme"];
	  
	  echo "\t<tr id=\"g$id_game-p$id_platform\"><td>$name</td><td>$platform</td><td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_game($id_game, $id_platform);\">Supprimer</button></td></tr>\n";
	}?>
	</table>
      </div> 
    </div>

    <div class="tab-pane" id="consultation3">
      <div class="container">
	<table class="table table-striped">
	  <tr><th>Pseudo</th><th>Nom</th><th>Prenom</th><th>Adresse mail</th><th>Suppression</th></tr>
	  <?php
	  $players = select_all("joueur");
	  
	  
	  while($att = mysql_fetch_array($players)){
	    $id = $att["pseudo"];
	    $last_name = $att["nom"];
	    $first_name = $att["prenom"];
	    $mail = $att["mail"];

	    echo "<tr id=\"$id\">
        <td>$id</td><td>$last_name</td><td>$first_name</td><td>$mail</td><td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_player('$id');\">Supprimer</button></td></tr>\n";
	}?>
	</table>
      </div> 
    </div>
    
  </div> <!-- Tab panes -->
</div> <!-- Container -->
