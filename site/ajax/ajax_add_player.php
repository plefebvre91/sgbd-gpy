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
$login = secure_string($_GET["pseudo"]);
$last_name = secure_string($_GET["nom"]);
$first_name = secure_string($_GET["prenom"]);
$mail = secure_string($_GET["mail"]);
$category = secure_string($_GET["idCategorie"]);
$platform = secure_string($_GET["idPlateforme"]);

//Selection dans la base
if(!add_player($login, $last_name, $first_name, $mail, $platform, $category)){
  echo "Une erreur est survenue lors de l'ajout joueur";
  exit;
}

echo "Le joueur a bien été ajouté";


?>