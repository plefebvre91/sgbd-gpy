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
//$id_comment  = secure_string($_GET["idCommentaire"]);
$note        = secure_string($_GET["note"]);
$comment     = secure_string($_GET["commentaire"]);
$pseudo      = secure_string($_GET["pseudo"]);
$id_game     = secure_string($_GET["idJeu"]);
$id_platform = secure_string($_GET["idPlateforme"]);


if($note > 20 || $note < 0){
  echo "La note doit être comprise entre 0 et 20";
  exit;
}

//Selection dans la base
if(!add_comment($note, $comment,  $pseudo, $id_game, $id_platform)){
  echo "Une erreur est survenue lors de l'ajout commentaire";
  exit;
}

echo "Le commentaire a bien été ajouté";

?>