-- pour un joueur donné, la liste des commentaires se référant à un jeu dans sa catégorie préférée,
-- disponible sur sa plateforme préférée ;

SELECT commentaire.* FROM commentaire INNER JOIN jeu
       ON commentaire.idJeu = jeu.idJeu
       WHERE jeu.idJeu IN 
       	     (SELECT jeu.idJeu FROM jeu WHERE jeu.idJeu IN
	            (SELECT appartient.idJeu FROM appartient INNER JOIN jeu 
		    	    ON jeu.idJeu = appartient.idJeu
	       	     	    WHERE appartient.idCategorie = (SELECT idCategorie FROM joueur WHERE joueur.pseudo = 'joueur2')))
       AND commentaire.idPlateforme IN
       	   (SELECT idPlateforme FROM joueur WHERE joueur.pseudo = 'joueur2');
