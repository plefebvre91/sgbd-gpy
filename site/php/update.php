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

function update_game($idJeu, $name, $id_editor, $categories, $platforms, $dates) {
  $result = true;
  
  $query = "UPDATE jeu SET nomJeu='$name', idEditeur='$id_editor' WHERE idJeu='$idJeu'";
  $result = $result && mysql_query($query) or die(mysql_error());
    
  //Construction de la requete d'insertion pour les plateformes
  $query = "INSERT INTO estDisponible VALUES";

  // Parcours des plateformes à ajouter
  for ($i = 0; $i < count($platforms); ++$i) {
    // Recuperation de la date de sortie correspondante
    $date = $dates[$platforms[$i] - 1];

    $pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}/"; // Regexp du format date : AAAA-MM-JJ (la taille est limitee a 10 par le formulaire)

    // Si la date n'est pas fournie ou n'est pas au bon format, utiliser la date du jour
    if ( $date == "" or ( ! preg_match($pattern, $date)) ) {
      $date = date("Y-m-d");
    }
    // Sinon, si la date est au bon format mais est invalide, utiliser la date du jour
    else {
      $dateParsee = date_parse_from_format("Y-m-d", $date);
      if ( ! checkdate($dateParsee['month'], $dateParsee['day'], $dateParsee['year']) ) {
	$date = date("Y-m-d");
      }
      else {
	$now = date_parse_from_format("Y-m-d", date("Y-m-d"));
	if ( ($dateParsee['year'] > $now['year']) ||
	    ( ($dateParsee['year'] == $now['year']) && ($dateParsee['month'] > $now['month']) ) ||
	    ( ($dateParsee['year'] == $now['year']) && ($dateParsee['month'] == $now['month']) && ($dateParsee['day'] > $now['day']) ) ) {
	  $date = date("Y-m-d");
	}
      }
    }
    
    // Construction de la requete
    $query .= " ('$platforms[$i]', '$idJeu', '$date'),";
  }

  $query = substr($query, 0, -1);   //Suppression de la virgule en trop en fin de ligne
  $result = $result && ( mysql_query($query) or die(mysql_error()) );

  //Construction de la requete d'insertion pour les categories
  $query = "INSERT INTO appartient VALUES"; 
  foreach ($categories as $id_category){
    $query .= " ('$id_category', '$idJeu'),";
  }
  $query = substr($query, 0, -1);   //Suppression de la virgule en trop en fin de ligne
  $result = $result && ( mysql_query($query) or die(mysql_error()) );
  
  return $result;
}


/* Mise a jour d'un commentaire */
/* Pour le changement d'editeur */
/* idPlateforme = selection avec (2) */
function update_comment($id, $mark, $comment, $login, $id_game, $id_platform){
  $query = "UPDATE commentaire SET note='$mark', commentaire='$comment', idPlateforme='$id_platform', idJeu='$id_game', pseudo='$login' WHERE idCommentaire='$id'";

  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}
?>