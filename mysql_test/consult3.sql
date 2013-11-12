-- pour un commentaire, la liste des joueurs qui l'ont apprécié.

SELECT * FROM joueur WHERE joueur.pseudo IN 
       (SELECT pouce.pseudo FROM pouce 
		     	    INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire 
					  	   WHERE commentaire.idCommentaire = 1
						   AND pouce.valeur = '+');
