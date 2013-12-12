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
$category = secure_string($_GET["nomCategorie"]);

//Selection dans la base
if(!add_category($category)){
  echo "Une erreur est survenue lors de l'ajout de la catégorie";
  exit;
}

echo "La catégorie bien été ajouté";


?>