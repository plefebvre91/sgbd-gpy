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
$id          = secure_string($_GET["idCommentaire"]);
$note        = secure_string($_GET["note"]);
$comment     = secure_string($_GET["commentaire"]);
$pseudo      = secure_string($_GET["pseudo"]);
$id_game     = secure_string($_GET["idJeu"]);
$id_platform = secure_string($_GET["idPlateforme"]);

if ( !is_numeric($note) || $note > 20 || $note < 0){
  echo "La note doit être un nombre compris entre 0 et 20.";
  exit;
}

//Selection dans la base
if(!update_comment($id, $note, $comment, $pseudo, $id_game, $id_platform)) {
  echo "Une erreur est survenue lors de la mise à jour du commentaire";
  exit;
}

echo "Les données du commentaire ont été mises à jour";
?>

