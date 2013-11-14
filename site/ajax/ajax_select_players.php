<?php
require_once("../php/include.php");
require_once("../php/selection.php");

//Connexion a la base
db_connect();

//Protection des de la chaine de caractere
$id = secure_string($_GET["id"]);

//Selection dans la base
$result = select_players_from_comments($id);

//Affichage du resultat
echo "<table class=\"table table-striped\">";
echo "<tr><th>Pseudo</th><th>Nom</th><th>Mail</th></tr>";

while($att = mysql_fetch_array($result)){
  $login = $att["pseudo"];
  $last_name = $att["nom"];
  $first_name = $att["prenom"];
  $mail = $att["mail"];
  echo "<tr><td>$login</td><td>$first_name</td><td>$last_name</td><td>$mail</td></tr>";
}

echo "</table>";
?>