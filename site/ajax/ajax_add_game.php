<?php
require_once("../php/include.php");
require_once("../php/add.php");

//Connexion a la base
$err = db_connect();

if(!$err){
  echo "Une erreur est survenue lors de la connexion à la base.";
  exit;
}

//Protection des chaîne de caracteres
$name = secure_string($_GET["nomJeu"]);
$editor = secure_string($_GET["nomEditeur"]);
$platforms = $_GET["idPlateforme"];
$categories = $_GET["idCategorie"];
$dates = $_GET["dateSortie"];

//Selection dans la base
if(!add_game($name, $categories, $platforms, $editor, $dates)) {
  echo "Une erreur est survenue lors de l'ajout jeu";
  exit;
}

echo "Le jeu a bien été ajouté";

?>