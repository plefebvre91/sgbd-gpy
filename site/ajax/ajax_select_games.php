<?php
require_once("../php/include.php");
require_once("../php/selection.php");

//Connexion a la base
db_connect();

//Protection des de la chaine de caractere
$platform = secure_string($_GET["nomPlateforme"]);

//Selection dans la base
$result = select_commented_games($platform);

if(!$result){
  echo "Une erreur est survenue lors de la selection dans la base";
  exit;
}

//Affichage du resultat
echo "<table class=\"table table-striped\">";
echo "<tr><th>Jeu</th><th>Catégorie</th></tr>";

while($att = mysql_fetch_array($result)){
  $name = $att["nomJeu"];
  $category = $att["nomCategorie"];
  echo "<tr><td>$name</td><td>$category</td></tr>";
}

echo "</table>";
?>