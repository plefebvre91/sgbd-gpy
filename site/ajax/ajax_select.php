<?php
require_once("../php/include.php");
require_once("../php/selection.php");
db_connect();
$cat = $_GET["cat"];
$s = select_commented_games($cat);
echo "<table class=\"table table-striped\">";
while($champ = mysql_fetch_array($s)){
  $nom = $champ["nomJeu"];
  $categorie = $champ["nomCategorie"];
  echo "<tr><td>$nom</td><td>$categorie</td></tr>";
}
echo "</table>";
?>