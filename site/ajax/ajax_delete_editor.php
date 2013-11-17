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
$id = secure_string($_GET["id"]);
//Suppression dans la base
if(!delete_editor($id)){
  echo "Une erreur est survenue lors de la suppression";
  exit;
}

echo "L'éditeur a bien été supprimé";


?>