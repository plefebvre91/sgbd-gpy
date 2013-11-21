<?php

/* Mise a jour d'un joueur */
function update_player($login, $last_name, $first_name, $mail, $category, $platform) {
  $id_platform = get_platform_by_name($platform);
  $id_category = get_category_by_name($category);

  $query = "UPDATE joueur SET nom='$last_name', prenom='$first_name', mail='$mail', idCategorie='$id_category', idPlateforme='$id_platform' WHERE pseudo='$login'";

  $result = mysql_query($query) or die(mysql_error());
  
  return (($result)?"true":"false");
}

  
/* Mise a jour d'un jeu */

/* Pour le changement d'editeur */
/* idEditeur = selection avec (1) */
function update_game($id, $name, $editor){
  $id_editor = get_editor_by_name($editor);
  $query = "UPDATE jeu SET nomJeu='$name', idEditeur='$id_editor' WHERE idJeu='$id'";

  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}


/* Mise a jour d'un commentaire */
/* Pour le changement d'editeur */
/* idPlateforme = selection avec (2) */
function update_comment($id, $mark, $comment, $platform){
  $id_platform = get_platform_by_name($platform);
  $query = "UPDATE commentaire SET note='$mark', commentaire='$comment', idPlateforme='$id_platform' WHERE idCommentaire='$id'";

  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}
?>