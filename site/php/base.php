<?php
//Pour eviter les injection SQL/XSS
//A faire avant chaque insertion dans la base
function secure_string($str){
  return mysql_escape_string(htmlentities($str));
}


function exec_query($filename){
  $query = get_file_content($filename);
  
  if(!$query){
    echo "Probleme lors de l'ouverture du fichier de requete\n";
    exit;
  }
  
  $result = mysql_query($query);
  	 
  return $result;
}

//Renvoie l'id de l'editeur correspondant au nom (1)
function get_editor_by_name($name) {
	 $query = "SELECT idEditeur FROM editeur WHERE nomEditeur='$name'";
	 $result = mysql_query($query) or die(mysql_error());
	 
	 $t  = mysql_fetch_array($result);
	 
	 return $t["idEditeur"];
}

//Recupere l'id de la plateforme correspondant au nom (2)
function get_platform_by_name($name) {
	 $query = "SELECT idPlateforme FROM plateforme WHERE nomPlateForme='$name'";
	 $result = mysql_query($query)  or die(mysql_error());
	 
	 $t  = mysql_fetch_array($result);

	 return $t["idPlateforme"];
}

//Recupere l'id de la categorie correspondant au nom (3)
function get_category_by_name($name) {
	 $query = "SELECT idCategorie FROM categorie WHERE nomCategorie='$name'";
	 $result = mysql_query($query)  or die(mysql_error());
	 $t  = mysql_fetch_array($result);
	 
	 return $t["idCategorie"];
}

//Recupere l'id du jeu correspondant au nom (4)
function get_game_by_name($name) {
	 $query = "SELECT idJeu FROM jeu WHERE nomJeu='$name'";
	 $result = mysql_query($query)  or die(mysql_error());
	 $t  = mysql_fetch_array($result);

	 return $t["idJeu"];
}


//Retourne le pseudo du joueur ayant l'id correspondant
function get_login_from_id($id){
  $query = "SELECT pseudo FROM joueur WHERE idJoueur='$id'";
  $result = mysql_query($query)  or die(mysql_error());
  $t  = mysql_fetch_array($result);
  
  return $t["pseudo"];
}

?>