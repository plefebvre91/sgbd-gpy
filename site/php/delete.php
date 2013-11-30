<?php
//Supprime le commentaire ayant l'id correspondant (et les champs des tables qui en dependent)
function delete_comment($id){
  $query = "DELETE FROM commentaire WHERE idCommentaire = '$id'";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

//Supprime le jeu ayant l'id correspondant (et les champs des tables qui en dependent)
function delete_game($id_game, $id_platform){
  $query = "DELETE FROM estDisponible WHERE idJeu='$id_game' AND idPlateforme='$id_platform'";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

//Supprime le joueur ayant le pseudo correspondant (et les champs des tables qui en dependent)
function delete_player($pseudo){
  $query = "DELETE FROM joueur WHERE pseudo = '$pseudo'";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}
?>