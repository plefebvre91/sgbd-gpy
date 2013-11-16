<?php
require_once("../php/include.php");
require_once("../php/delete.php");

//Connexion a la base
db_connect();

//Protection des de la chaine de caractere
$id = secure_string($_GET["id"]);
//Selection dans la base
if(!delete_comment($id)){
  echo "Une erreur est survenue lors de la suppression";
}
?>