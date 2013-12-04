<?php
//Pour eviter les injection SQL/XSS
//A faire avant chaque insertion dans la base
function secure_string($str){
  return mysql_escape_string(htmlentities($str));
}

function tab_class($current_page, $link_page){
  if($current_page == $link_page){
    return "class=\"active\"";
  }
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
	 $query = "SELECT idPlateforme FROM plateforme WHERE nomPlateforme='$name'";
	 $result = mysql_query($query)  or die(mysql_error());
	 
	 $t  = mysql_fetch_array($result);

	 return $t["idPlateforme"];
}

////Recupere l'id de la categorie correspondant au nom (3)
//function get_category_by_name($name) {
//	 $query = "SELECT idCategorie FROM categorie WHERE nomCategorie='$name'";
//	 $result = mysql_query($query)  or die(mysql_error());
//	 $t  = mysql_fetch_array($result);
//	 
//	 return $t["idCategorie"];
//}
//
////Recupere l'id du jeu correspondant au nom (4)
//function get_game_by_name($name) {
//	 $query = "SELECT idJeu FROM jeu WHERE nomJeu='$name'";
//	 $result = mysql_query($query)  or die(mysql_error());
//	 $t  = mysql_fetch_array($result);
//
//	 return $t["idJeu"];
//}
//
//
////Retourne le pseudo du joueur ayant l'id correspondant
//function get_login_from_id($id){
//  $query = "SELECT pseudo FROM joueur WHERE idJoueur='$id'";
//  $result = mysql_query($query)  or die(mysql_error());
//  $t  = mysql_fetch_array($result);
//  
//  return $t["pseudo"];
//}

function get_game_categories($id){
  $query = "SELECT nomCategorie FROM ((jeu INNER JOIN appartient ON jeu.idJeu = appartient.idJeu) INNER JOIN categorie ON categorie.idCategorie = appartient.idCategorie) WHERE jeu.idJeu = '$id'";
  $result = mysql_query($query)  or die(mysql_error());
  $categories = "";
  while($att  = mysql_fetch_array($result)){
    $categories .= $att["nomCategorie"]."<br/>";
  }
  
  return $categories;
}


function get_game_platforms($id){
  $query = "SELECT nomPlateforme, dateSortie FROM ((jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu) INNER JOIN plateforme  ON plateforme.idPlateforme = estDisponible.idPlateforme) WHERE jeu.idJeu = '$id'";
  $result = mysql_query($query)  or die(mysql_error());
  $categories = "";
  while($att  = mysql_fetch_array($result)){
    $categories .= $att["nomPlateforme"]." (".$att["dateSortie"].")<br/>";
  }
  
  return $categories;
}



?>