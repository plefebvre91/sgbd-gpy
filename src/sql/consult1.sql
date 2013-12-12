-- l'ensemble des jeux critiqués disponibles sur une plateforme donnée, classés par catégorie ;

SELECT res.nomJeu, categorie.nomCategorie FROM categorie INNER JOIN
       (SELECT jeu.*, appartient.idCategorie FROM jeu LEFT OUTER JOIN appartient
       	       ON jeu.idJeu = appartient.idJeu
       	       WHERE jeu.idJeu IN
       	       	     (SELECT jeu.idJeu FROM jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu
	             	     WHERE estDisponible.idPlateforme IN
	     	             	   (SELECT plateforme.idPlateforme FROM plateforme INNER JOIN estDisponible
	       	       			       ON plateforme.idPlateforme = estDisponible.idPlateforme
					       WHERE plateforme.nomPlateforme = 'Plateforme A')
                 	     AND jeu.idJeu IN
	                     	   (SELECT jeu.idJeu FROM commentaire INNER JOIN jeu
	     	     	       	    	  ON jeu.idJeu = commentaire.idJeu))) as res
	ON categorie.idCategorie = res.idCategorie
        ORDER BY categorie.nomCategorie ASC;
