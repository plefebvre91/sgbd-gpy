<?php
require_once("../php/include.php");
require_once("../php/update.php");

//Connexion a la base
$err = db_connect();

if(!$err){
  echo "Une erreur est survenue lors de la connexion à la base.";
  exit;
}

//Protection des de la chaine de caractere
$game_name = secure_string($_GET["nomJeu"]);
$id_editor = secure_string($_GET["idEditeur"]);

//Selection dans la base
if(!update_game($game_name, $id_editor)) {
  echo "Une erreur est survenue lors de la mise à jour du jeu";
  exit;
}

echo "Les données du jeu ont été mises à jour";

?>

