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
$platform = secure_string($_GET["nomPlateforme"]);

//Selection dans la base
if(!add_platform($platform)){
  echo "Une erreur est survenue lors de l'ajout de la plateforme";
  exit;
}

echo "La plateforme bien été ajouté";


?>