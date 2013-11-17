<?php

require_once("include.php");
//Ajout d'un jeu
// idEditeur = selection avec (1)
// idPlateforme = selection avec (2)
// idCategorie = selection avec (3)

function add_game($name, $category, $platform, $editor){
  $id_category = get_category_by_name($category);
  $id_platform = get_plateform_by_name($platform);
  $id_editor = get_editor_by_name($editor);

  $query = "INSERT INTO jeu VALUES ('', '$name', idEditeur);";
  mysql_query($query) or die(mysql_error());

  $last_game_id = mysql_query("SELECT LAST_INSERT_ID() FROM jeu");
  
  $query = "INSERT INTO estDisponible VALUES ('$id_platform', '$last_game_id')";
  mysql_query($query) or die(mysql_error());
  
  $query = "INSERT INTO appartient VALUES ('$id_category',  '$last_game_id)'";
  mysql_query($query) or die(mysql_error());
}


 /* Ajout d'un joueur */
 /* idPlateforme preferee = selection avec (2) */
 /* idCategorie preferee = selection avec (3) */
function add_player($login, $last_name, $first_name, $mail, $id_platform, $id_category){
  //  $id_platform = get_platform_by_name($platform);
  //$id_category = get_category_by_name($category);

  $query = "INSERT INTO joueur VALUES ('$login', '$last_name', '$first_name', '$mail', '$id_platform', '$id_category')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_editor($name){

  $query = "INSERT INTO  editeur VALUES ('', '$name')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_platform($platform){

  $query = "INSERT INTO  plateforme VALUES ('', '$platform')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_category($category){

  $query = "INSERT INTO  categorie VALUES ('', '$category')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_comment($id_comment, $note, $comment, $date, $pseudo, $id_game, $id_platform){
  //$pseudo = get_player_by_name($player);
  //$id_game = get_game_by_name($game);
  //$id_category = get_category_by_name($category);

  $query = "INSERT INTO commentaire VALUES ('$id_comment', '$note', '$comment', '$date', '$pseudo', '$id_game', '$id_platform')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_inch($inch, $value, $pseudo, $id_comment){
  //$pseudo = get_player_by_name($player);
  //$id_comment = get_comment_by_name($comment);

  $query = "INSERT INTO pouce VALUES ('$inch', '$value', '$pseudo', '$id_comment')";
  $result = mysql_query($query) or die(mysql_error());o

  return $result;
}


?>