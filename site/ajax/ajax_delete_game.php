<?php
require_once("../php/include.php");
require_once("../php/delete.php");

//Connexion a la base
$err = db_connect();

if(!$err){
  echo "Une erreur est survenue lors de la connexion à la base.";
  exit;
}

//Protection des de la chaine de caractere
$id_game = secure_string($_GET["id_game"]);
$id_platform = secure_string($_GET["id_plateform"]);
//Selection dans la base
if(!delete_game($id_game, $id_platform)){
  echo "Une erreur est survenue lors de la suppression";
  exit;
}

echo "Le jeu a bien été supprimé";


?>