-- L'ensemble des jeux critiques disponibles sur une plateforme donnée classes par categorie
SELECT res.nomJeu, categorie.nomCategorie FROM categorie INNER JOIN
       (SELECT jeu.*, appartient.idCategorie FROM jeu LEFT OUTER JOIN appartient
       	       ON jeu.idJeu = appartient.idJeu
       	       WHERE jeu.idJeu IN
            	     (SELECT jeu.idJeu FROM jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu
 		       WHERE estDisponible.idPlateforme IN
 	     	      	   (SELECT plateforme.idPlateforme FROM plateforme INNER JOIN estDisponible
 	       	     	       ON plateforme.idPlateforme = estDisponible.idPlateforme
 			       WHERE plateforme.nomPlateforme = #nom_plateforme#)
                	       AND jeu.idJeu IN
 	                       (SELECT jeu.idJeu FROM commentaire INNER JOIN jeu
 	     	     	          ON jeu.idJeu = commentaire.idJeu))) as res
				  ON categorie.idCategorie = res.idCategorie
				  ORDER BY categorie.nomCategorie ASC;



-- Pour un commentaire donne (par id), la liste des joueurs qui l'ont apprecie
SELECT * FROM joueur WHERE joueur.pseudo IN
    (SELECT pouce.pseudo FROM pouce INNER JOIN commentaire 
     ON pouce.idCommentaire = commentaire.idCommentaire 
     WHERE commentaire.idCommentaire = #id_commentaire# AND pouce.valeur = '+')";


-- Pour un joueur donné, la liste des commentaires se référant à un jeu 
-- dans sa catégorie préférée disponible sur sa plateforme préférée                                                                                 
SELECT commentaire.* FROM commentaire INNER JOIN jeu ON commentaire.idJeu = jeu.idJeu
       WHERE jeu.idJeu IN
       (SELECT jeu.idJeu FROM jeu WHERE jeu.idJeu IN
       (SELECT appartient.idJeu FROM appartient INNER JOIN jeu
        ON jeu.idJeu = appartient.idJeu
        WHERE appartient.idCategorie = (SELECT idCategorie FROM joueur WHERE joueur.pseudo = #login#)))
        AND commentaire.idPlateforme IN
        (SELECT idPlateforme FROM joueur WHERE joueur.pseudo = #login#);






