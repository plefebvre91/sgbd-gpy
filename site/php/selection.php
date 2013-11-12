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
?>