<div class="container">
  <div class="well top-message">
    <p>Cliquez sur les différents onglets pour accéder aux requêtes de statistiques.</p>

  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTab">
    <li><a href="#consultation1" data-toggle="tab">Les derniers commentaires</a></li>
    <li><a href="#consultation2" data-toggle="tab">Commentaires les plus appréciés</a></li>
    <li><a href="#consultation3" data-toggle="tab">Joueurs les plus actifs</a></li>
    <li><a href="#consultation4" data-toggle="tab">Commentaire ayant laissé le moins indifférent</a></li>
    <li><a href="#consultation5" data-toggle="tab">Classement des jeux</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane active" id="consultation1">
      <div class="container">
	<form action="index.php?action=statistiques" method="post">
  	  <div class="form-group">
  	    <label for="nbCommentaires">Nombre de commentaires à afficher</label>
	    <input type="number" min="0" step="5" name="nbCommentaires" id="nbCommentaires" class="form-control" placeholder="Saisissez le nombre de commentaires à afficher ici.."/>
  	  </div>
  	  <div class="form-group text-center">
	    <input type="submit" class="btn btn-warning btn-lg" id="btn-statistiques1" value="Envoyer la requête">
  	  </div>
	</form>
	<?php
	$comments = get_last_comments($nb_comments);

	echo "<table class=\"table table-hover\">";
	echo "<tr class=\"active\"><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th></tr>";

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $comment = substr($att["commentaire"], 0, 100)."...";

	  
	  echo "<tr id=\"comment$id\">
        <td>$comment</td><td>$author</td><td>$date</td><td>$mark</td></tr>";
	}

	echo "</table>";?>
      </div> 
    </div>
    
    <div class="tab-pane" id="consultation2">
      <div class="container">

	<?php
	//Commentaires classes par appreciation
	$comments = get_comments_by_appreciation();

	echo "<table class=\"table table-hover\">";
	echo "<tr class=\"active\"><th>ID</th><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th><th>Indice de confiance</th></tr>";

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $comment = substr($att["commentaire"], 0, 100)."...";
	  $index = $att["indiceConfiance"];

	  // Conversion en flottant et arrondi
	  $index = floatval($index);
	  $index = round($index, 2);
	  
	  echo "<tr id=\"comment$id\">
        <td>$id</td><td>$comment</td><td>$author</td><td>$date</td><td>$mark</td>
        <td>$index</td></tr>";
	}

	echo "</table>";
	?>


      </div> 
    </div>

    <div class="tab-pane" id="consultation3">
      <div class="container">
	<?php
	//Joueurs ayant note le plus de commentaires
	$players = get_active_players();

	echo "<table class=\"table table-hover\">";
	echo "<tr class=\"active\"><th>Pseudo</th><th>Nombre d'appréciation(s)</th></tr>";

	while($att = mysql_fetch_array($players)){
	  $id = $att["pseudo"];
	  $nb_appreciation = $att["NbJeuxNotes"];
	  
	  echo "<tr id=\"$id\">
        <td>$id</td><td>$nb_appreciation</td></tr>\n";
	}

	echo "</table>";?>


      </div> 
    </div>
    
    <div class="tab-pane" id="consultation4">
      <div class="container">
	<?php
	//Le commentaire ayant laisse le moins indifferent
	$comments = get_most_attractive_comment();

	echo "<table class=\"table table-hover\">";
	echo "<tr class=\"active\"><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th></tr>";

	while($att = mysql_fetch_array($comments)){
	  $id = $att["idCommentaire"];
	  $mark = $att["note"];
	  $author = $att["pseudo"];
	  $date = $att["dateCommentaire"];
	  $comment = substr($att["commentaire"], 0, 100)."...";

	  
	  echo "<tr id=\"comment$id\">
        <td>$comment</td><td>$author</td><td>$date</td><td>$mark</td></tr>";
	}

	echo "</table>";?>

	
      </div> 
    </div>

    <div class="tab-pane" id="consultation5">

      <div class="container">
	<table class="table table-hover">
	  <tr class="active"><th>Nom du jeu</th><th>Moyenne pondérée</th><th>Total Indice de Confiance des commentaires sur le jeu</th></tr>
	  
	  <?php
	  // Requête de classement des jeux

	  $games = mysql_query("SELECT nomJeu AS \"Nom du jeu\", MP AS \"Moyenne pondérée\", TotalIC AS \"Total IC des commentaires du jeu\" FROM jeu NATURAL JOIN (
SELECT idJeu, ( SUM(note  * (1 + res.c)/(1 + res.d)) ) / ( SUM((1 + res.c)/(1 + res.d)) ) AS \"MP\", SUM((1 + res.c)/(1 + res.d)) AS \"TotalIC\" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS \"c\", SUM(IF(pouce.valeur = '-', 1, 0)) AS \"d\"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       GROUP BY idJeu
       ORDER BY ( SUM(note  * (1 + res.c)/(1 + res.d)) ) / ( SUM((1 + res.c)/(1 + res.d)) ) DESC, SUM((1 + res.c)/(1 + res.d)) DESC) AS classement;");
	  
	  while($att = mysql_fetch_array($games)){
	    $game = $att["Nom du jeu"];
	    $average = $att["Moyenne pondérée"];
	    $totalIC = $att["Total IC des commentaires du jeu"];

	    // Conversion en flottant et arrondi
	    $average = floatval($average);
	    $average = round($average, 2);
	    $totalIC = floatval($totalIC);
	    $totalIC = round($totalIC, 2);
	    
	    echo "<tr><td>$game</td><td>$average</td><td>$totalIC</td></tr>\n";
	  }?>
	  
	</table>
      </div> 
    </div>
    
  </div> <!-- Tab panes -->
  
</div> <!-- Container -->