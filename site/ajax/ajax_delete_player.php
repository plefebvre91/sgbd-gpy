<?php
require_once("../php/include.php");
require_once("../php/delete.php");

//Connexion a la base
db_connect();

//Protection des de la chaine de caractere
$pseudo = secure_string($_GET["pseudo"]);
//Selection dans la base
if(!delete_player($pseudo)){
  echo "Une erreur est survenue lors de la suppression";
}
?>