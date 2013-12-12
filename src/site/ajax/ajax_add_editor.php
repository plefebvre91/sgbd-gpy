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
$name = secure_string($_GET["nomEditeur"]);

//Selection dans la base
if(!add_editor($name)){
  echo "Une erreur est survenue lors de l'ajout de l'éditeur";
  exit;
}

echo "L'éditeur a bien été ajouté";


?>