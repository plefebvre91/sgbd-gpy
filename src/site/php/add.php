<?php
//Ajout d'un jeu
// idEditeur = selection avec (1)
// idPlateforme = selection avec (2)
// idCategorie = selection avec (3)

function add_game($name, $categories, $platforms, $editor, $dates) {

  $result = true;
  $id_editor = get_editor_by_name($editor);

  $query = "INSERT INTO jeu VALUES ('', '$name', '$id_editor')";
  $result = $result && ( mysql_query($query) or die(mysql_error()) );

  // Recuperation de l'id de jeu insere
  $game_id = mysql_fetch_array( mysql_query("SELECT idJeu FROM jeu WHERE nomJeu = '$name'") )["idJeu"];
  
  // Construction de la requete d'insertion pour les plateformes
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
    // Sinon, si la date est au bon format mais est invalide ou postérieure à la date actuelle, utiliser la date du jour
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
    $query .= " ('$platforms[$i]', '$game_id', '$date'),";
  }
  
  $query = substr($query, 0, -1); // Suppression de la virgule en trop en fin de ligne
  $result = $result && ( mysql_query($query) or die(mysql_error()) );

  // Construction de la requete d'insertion pour les categories
  $query = "INSERT INTO appartient VALUES"; 
  foreach ($categories as $id_category) {
    $query .= " ('$id_category', '$game_id'),";
  }
  $query = substr($query, 0, -1); // Suppression de la virgule en trop en fin de ligne
  $result = $result && ( mysql_query($query) or die(mysql_error()) );
  
  return $result;
}

/* Ajout d'un joueur */
/* idPlateforme preferee = selection avec (2) */
/* idCategorie preferee = selection avec (3) */
function add_player($login, $last_name, $first_name, $mail, $id_category, $id_platform) {
  //$id_platform = get_platform_by_name($platform);
  //$id_category = get_category_by_name($category);

  $query = "INSERT INTO joueur VALUES ('$login', '$last_name', '$first_name', '$mail', '$id_category', '$id_platform')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_editor($name) {

  $query = "INSERT INTO  editeur VALUES ('', '$name')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_platform($platform) {

  $query = "INSERT INTO  plateforme VALUES ('', '$platform')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_category($category) {

  $query = "INSERT INTO  categorie VALUES ('', '$category')";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function add_comment($note, $comment, $pseudo, $id_game, $id_platform) {
  //$id_game = get_game_by_name($game);
  
  $insertionAllowed = false;
  
  // Parcours de la table estDisponible pour vérifier que le jeu choisi est bien disponible sur la plateforme choisie
  $disponibilities = select_all("estDisponible where idJeu = '$id_game'");
  while ( ($row = mysql_fetch_array($disponibilities)) && ($insertionAllowed == false) ) {
    $base_platform = $row["idPlateforme"];
    if ($base_platform == $id_platform) // Si le jeu choisi est disponible sur la plateforme choisie
      $insertionAllowed = true; // Autoriser l'insertion
  }
  

  //Verification que le votant n'a pas dejà commenté ce jeu
  $result = mysql_query("SELECT * FROM commentaire WHERE pseudo='$pseudo' AND idJeu='$id_game'");
  if(mysql_num_rows($result) != 0){
    
    die("Vous avez déjà commenté ce jeu.");
  }

  if ($insertionAllowed) {
    $query = "INSERT INTO commentaire VALUES ('', '$note', '$comment', (SELECT CURDATE()), '$pseudo', '$id_game', '$id_platform')";
    $result = mysql_query($query) or die(mysql_error());

    return $result;
  }
  else
    die("Ajout de commentaire impossible car ce jeu n'existe pas sur cette plateforme.");
}

function add_inch($value, $pseudo, $id_comment) {
  $query = "SELECT pseudo FROM commentaire WHERE idCommentaire='$id_comment'";
  $result = mysql_query($query);

  while($att = mysql_fetch_array($result)){
    if($pseudo == $att["pseudo"]){
      die("Vous ne pouvez pas voter pour votre propre commentaire");
    }
  }

  $query = "INSERT INTO pouce VALUES ('', '$value', '$pseudo', '$id_comment')";
  $result = mysql_query($query);

  return $result;
}
?>