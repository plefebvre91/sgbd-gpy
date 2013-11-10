<?php

//Pour eviter les injection SQL/XSS
//A faire avant chaque insertion dans la base
function secure_string($str){
  return mysql_escape_string(htmlentities($str));
}


//Renvoie l'id de l'editeur correspondant au nom (1)
function get_editor_by_name($name) {
	 $query = "SELECT editeur.idEditeur WHERE editeur.nomEditeur='$name'";
	 $result = mysql_query($query);

	 return $result;
}

//Recupere l'id de la plateforme correspondant au nom (2)
function get_platform_by_name($name) {
	 $query = "SELECT plateforme.idPlateforme WHERE plateforme.nomPlateforme='$name'";
	 $result = mysql_query($query);
	 
	 return $result;
}

//Recupere l'id de la categorie correspondant au nom (3)
function get_category_by_name($name) {
	 $query = "SELECT categorie.idCategorie WHERE categorie.nomCategorie='$name'";
	 $result = mysql_query($query);
	 
	 return $result;
}

//Recupere l'id du jeu correspondant au nom (4)
function get_game_by_name($name) {
	 $query = "SELECT jeu.idJeu WHERE jeu.nomJeu='$name'";
	 $result = mysql_query($query);
	 
	 return $result;
}


/* function get_game_by_id($game) { */
/* 	 $query = "SELECT plateforme LEFT INNER JOIN jeu ON plateforme.idPlateforme = jeu.idJeu WHERE jeu.nomJeu='$game'"; */
/* 	 $result = mysql_query($query); */
	 
/* 	 return $result; */
/* } */

/*
--Selection de idPlateforme depuis nomJeu (5)
SELECT plateforme LEFT INNER JOIN jeu 
ON plateforme.idPlateforme = jeu.idJeu
WHERE jeu.nomJeu='nomDuJeu';
*/

?>