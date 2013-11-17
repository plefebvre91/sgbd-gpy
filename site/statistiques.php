<?php 
require_once("php/include.php"); 
require_once("php/stats.php");
    
?>
<div class="container">
   <div class="well top-message">
   <p>Cliquez sur les différents onglets pour accéder aux quatre requêtes de statistiques.</p>

   </div>

   <!-- Nav tabs -->
   <ul class="nav nav-tabs" id="myTab">
       <li><a href="#consultation1" data-toggle="tab">Les derniers commentaires</a></li>
       <li><a href="#consultation2" data-toggle="tab">Commentaires les plus appréciés</a></li>
       <li><a href="#consultation3" data-toggle="tab">Joueurs les plus actif</a></li>
       <li><a href="#consultation4" data-toggle="tab">Commentaire ayant laissé le moins indifférent</a></li>
   </ul>

   <!-- Tab panes -->
   <div class="tab-content">

 <div class="tab-pane active" id="consultation1">
   	<div class="container">
  <form action="index.php?action=statistiques" method="post">
  <input type="text" name="nbCommentaires">
  <input type="submit" value="Envoyer">
</form>
     <?php
  //Les derniers commentaires
   db_connect();


   $comments = get_last_comments($nb_comments);

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th></tr>";

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

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>ID</th><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th><th>Appréciation</th></tr>";

while($att = mysql_fetch_array($comments)){
  $id = $att["idCommentaire"];
  $mark = $att["note"];
  $author = $att["pseudo"];
  $date = $att["dateCommentaire"];
  $comment = substr($att["commentaire"], 0, 100)."...";
  $index = $att["indiceConfiance"];
  
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

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Pseudo</th><th>Nombre d'appréciation(s)</th></tr>";

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

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th></tr>";

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

   
   </div> <!-- Tab panes -->

   
</div> <!-- Container -->
