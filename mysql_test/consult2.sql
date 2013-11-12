-- pour un joueur donn�, la liste des commentaires se r�f�rant � un jeu dans sa cat�gorie pr�f�r�e,
-- disponible sur sa plateforme pr�f�r�e ;

SELECT commentaire.* FROM commentaire INNER JOIN jeu
       ON commentaire.idJeu = jeu.idJeu
       WHERE jeu.idJeu IN 
       	     (SELECT jeu.idJeu FROM jeu WHERE jeu.idJeu IN
	            (SELECT appartient.idJeu FROM appartient INNER JOIN jeu 
		    	    ON jeu.idJeu = appartient.idJeu
	       	     	    WHERE appartient.idCategorie = (SELECT idCategorie FROM joueur WHERE joueur.pseudo = 'joueur2')))
       AND commentaire.idPlateforme IN
       	   (SELECT idPlateforme FROM joueur WHERE joueur.pseudo = 'joueur2');
