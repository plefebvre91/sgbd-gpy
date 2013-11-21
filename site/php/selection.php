<?php
require_once("include.php");

//L'ensemble des jeux critiques disponibles sur une plateforme donnée classes par categorie

function select_commented_games($platform){
  $query = " SELECT res.nomJeu, categorie.nomCategorie FROM categorie INNER JOIN
        (SELECT jeu.*, appartient.idCategorie FROM jeu LEFT OUTER JOIN appartient
        	       ON jeu.idJeu = appartient.idJeu
        	       WHERE jeu.idJeu IN
        	       	     (SELECT jeu.idJeu FROM jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu
 	             	     WHERE estDisponible.idPlateforme IN
 	     	             	   (SELECT plateforme.idPlateforme FROM plateforme INNER JOIN estDisponible
 	       	       			       ON plateforme.idPlateforme = estDisponible.idPlateforme
 					       WHERE plateforme.nomPlateforme = '$platform')
                  	     AND jeu.idJeu IN
 	                     	   (SELECT jeu.idJeu FROM commentaire INNER JOIN jeu
 	     	     	       	    	  ON jeu.idJeu = commentaire.idJeu))) as res
 	ON categorie.idCategorie = res.idCategorie
         ORDER BY categorie.nomCategorie ASC";

  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}

//Pour un commentaire donne (par id), la liste des joueurs qui l'ont appricie
function select_players_from_comments($id){
  $query =  "SELECT * FROM joueur WHERE joueur.pseudo IN
             (SELECT pouce.pseudo FROM pouce INNER JOIN commentaire 
             ON pouce.idCommentaire = commentaire.idCommentaire 
            WHERE commentaire.idCommentaire = '$id' AND pouce.valeur = '+')";

    $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}


//Pour un joueur donné, la liste des commentaires se référant à un jeu 
//dans sa catégorie préférée disponible sur sa plateforme préférée                                                                                  
function select_comments_from_preferences($login){
  $query =  "SELECT commentaire.* FROM commentaire INNER JOIN jeu ON commentaire.idJeu = jeu.idJeu
            WHERE jeu.idJeu IN
            (SELECT jeu.idJeu FROM jeu WHERE jeu.idJeu IN
                  (SELECT appartient.idJeu FROM appartient INNER JOIN jeu
                            ON jeu.idJeu = appartient.idJeu
                            WHERE appartient.idCategorie = (SELECT idCategorie FROM joueur WHERE joueur.pseudo = '$login')))
                            AND commentaire.idPlateforme IN
                            (SELECT idPlateforme FROM joueur WHERE joueur.pseudo = '$login')";
  
  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}

function select_all($table){
  $query =  "SELECT * FROM $table";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}


function select_comments(){
  $query =  "SELECT * FROM commentaire";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}

function select_games(){
  $query =  "SELECT idJeu, nomJeu, nomEditeur FROM jeu INNER JOIN editeur ON jeu.idEditeur = editeur.idEditeur";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}
  

function select_players(){
  $query =  "SELECT * FROM joueur";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}


function select_platforms(){
  $query =  "SELECT * FROM plateforme";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}



function select_editors(){
  $query =  "SELECT * FROM editeur";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}


function select_categories(){
  $query =  "SELECT * FROM categorie";
  $result = mysql_query($query) or die(mysql_error());
  return $result;
}


?>