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
$game_id = secure_string($_GET["idJeu"]);

// Traitement différent selon ce que l'utilisateur a fourni
// Si aucune case plateforme n'est cochée
if ( ! isset($_GET["idPlateforme"]) ) {
  $platforms = NULL;
}
else {
  $platforms = $_GET["idPlateforme"];
}
// Si aucune case catégorie n'est cochée
if ( !isset($_GET["idCategorie"]) ) {
  $categories = NULL;
}
else {
  $categories = $_GET["idCategorie"];
}

$dates = $_GET["dateSortie"]; // Ne cause pas d'erreur

//Selection dans la base
if(!update_game($game_id, $game_name, $id_editor, $categories, $platforms, $dates)) {
  echo "Une erreur est survenue lors de la mise à jour du jeu";
  exit;
}

echo "Les données du jeu ont été mises à jour";

?>

