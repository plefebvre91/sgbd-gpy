<?php
require_once("../php/include.php");
require_once("../php/selection.php");

//Connexion a la base
db_connect();

//Protection des de la chaine de caractere
$login = secure_string($_GET["pseudo"]);

//Selection dans la base
$result = select_comments_from_preferences($login);

if(!$result){
  echo "Une erreur est survenue lors de la selection dans la base";
  exit;
}

//Affichage du resultat
echo "<table class=\"table table-striped\">";
echo "<tr><th>Commentaire</th><th>Auteur</th><th>Date</th><th>Note</th></tr>";

while($att = mysql_fetch_array($result)){
  $login = $att["pseudo"];
  $date = $att["dateCommentaire"];
  $mark = $att["note"];
  $comment = $att["commentaire"];
  echo "<tr><td>$comment</td><td>$login</td><td>$date</td><td>$mark</td></tr>";
}

echo "</table>";
?>