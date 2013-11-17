<?php
require_once("../php/include.php");
require_once("../php/add.php");

//Connexion a la base
$err = db_connect();

if(!$err){
  echo "Une erreur est survenue lors de la connexion à la base.";
  exit;
}

//Protection des de la chaine de caractere
//$inch        = secure_string($_GET["idPouce"]);
$value       = secure_string($_GET["valeur"]);
$pseudo      = secure_string($_GET["pseudo"]);
$id_comment  = secure_string($_GET["idCommentaire"]);

//Selection dans la base
if(!add_inch($value, $pseudo, $id_comment)){
  echo "Une erreur est survenue lors de l'ajout pouce";
  exit;
}

echo "Le pouce a bien été ajouté";
?>