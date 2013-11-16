<?php 
require_once("php/include.php"); 
require_once("php/selection.php");
?>
<h2>Formulaire de commentaire</h2>
<script src="js/delete.js"></script>
<div class="alert alert-info" id="result"></div>
   <?php
   db_connect();
   $comments = select_comments();

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th><th>Suppression</th></tr>";

while($att = mysql_fetch_array($comments)){
  $id = $att["idCommentaire"];
  $mark = $att["note"];
  $author = $att["pseudo"];
  $date = $att["dateCommentaire"];
  $comment = substr($att["commentaire"], 0, 100)."...";

  
  echo "<tr id=\"comment$id\">
        <td>$comment</td><td>$author</td><td>$date</td><td>$mark</td>
        <td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_comment($id);\">Supprimer</button></td></tr>";
}

echo "</table>";

/********************* DEUXIEME ONGLET **********************************/


$games = select_games();

  echo "<table class=\"table table-striped\">";
  echo "<tr><th>Jeu</th><th>Editeur</th><th>Suppression</th></tr>";

while($att = mysql_fetch_array($games)){
  $id = $att["idJeu"];
  $editor = $att["nomEditeur"];
  $name= $att["nomJeu"];
  
  echo "<tr id=\"game$id\">
        <td>$name</td><td>$editor</td><td><button class=\"btn btn-danger btn-xs\" onclick=\"javascript:delete_game($id);\">Supprimer</button></td></tr>\n";
}

echo "</table>";


/******************************** TROISIEME ONGLET *******************************/

$players = select_players();

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

echo "</table>";



/******************************************* ONGLET 4 ***********************************/


$editors = select_editors();

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
</form>
</form>