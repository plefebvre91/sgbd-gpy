<?php
function delete_comment($id){
  $query = "DELETE FROM pouce WHERE idCommentaire = '$id'";
  $result = mysql_query($query) or die(mysql_error());
  $query = "DELETE FROM commentaire WHERE idCommentaire = '$id'";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}

function delete_game($id){
  $query = "DELETE FROM jeu WHERE idJeu = '$id'";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}


function delete_player($pseudo){

  $query = "DELETE FROM pouce WHERE pseudo = '$pseudo'";
  $result = mysql_query($query) or die(mysql_error());

  $query = "DELETE FROM commentaire WHERE pseudo = '$pseudo'";
  $result = mysql_query($query) or die(mysql_error());

  $query = "DELETE FROM joueur WHERE pseudo = '$pseudo'";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}


?>