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
$login = secure_string($_GET["pseudo"]);
$last_name = secure_string($_GET["nom"]);
$first_name = secure_string($_GET["prenom"]);
$mail = secure_string($_GET["mail"]);
$category = secure_string($_GET["nomCategorie"]);
$platform = secure_string($_GET["nomPlateforme"]);

//Selection dans la base
if(!update_player($login, $last_name, $first_name, $mail, $category, $platform)) {
  echo "Une erreur est survenue lors de la mise à jour du joueur";
  exit;
}

echo "Les données du joueur ont été mises à jour";

?>

