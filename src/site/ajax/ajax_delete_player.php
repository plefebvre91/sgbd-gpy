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
$pseudo = secure_string($_GET["id"]);
//Selection dans la base
if(!delete_player($pseudo)){
  echo "Une erreur est survenue lors de la suppression";
  exit;
}

echo "Le joueur a bien été supprimé";


?>