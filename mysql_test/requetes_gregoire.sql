-- SELECT * FROM jeu

-- SELECT ssrqt.idJeu, ssrqt.nomJeu, categorie.nomCategorie
-- FROM (
--      SELECT jeu.* , appartient.idCategorie
--      FROM jeu
--      INNER JOIN appartient ON jeu.idJeu = appartient.idJeu
--      ) as ssrqt
--      LEFT OUTER JOIN categorie
-- ON ssrqt.idCategorie  = categorie.idCategorie
-- ORDER BY categorie.nomCategorie ASC;


-- l'ensemble des jeux critiqu�s disponibles sur une plateforme donn�e, class�s par cat�gorie ;

-- SELECT res.nomJeu, categorie.nomCategorie FROM categorie INNER JOIN
--        (SELECT jeu.*, appartient.idCategorie FROM jeu LEFT OUTER JOIN appartient
--        	       ON jeu.idJeu = appartient.idJeu
--        	       WHERE jeu.idJeu IN
--        	       	     (SELECT jeu.idJeu FROM jeu INNER JOIN estDisponible ON jeu.idJeu = estDisponible.idJeu
-- 	             	     WHERE estDisponible.idPlateforme IN
-- 	     	             	   (SELECT plateforme.idPlateforme FROM plateforme INNER JOIN estDisponible
-- 	       	       			       ON plateforme.idPlateforme = estDisponible.idPlateforme
-- 					       WHERE plateforme.nomPlateforme = 'Plateforme A')
--                  	     AND jeu.idJeu IN
-- 	                     	   (SELECT jeu.idJeu FROM commentaire INNER JOIN jeu
-- 	     	     	       	    	  ON jeu.idJeu = commentaire.idJeu))) as res
-- 	ON categorie.idCategorie = res.idCategorie
--         ORDER BY categorie.nomCategorie ASC;


-- pour un commentaire, la liste des joueurs qui l'ont appr�ci�.
-- SELECT * FROM joueur WHERE joueur.pseudo IN 
--        (SELECT pouce.pseudo FROM pouce 
-- 		     	    INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire 
-- 					  	   WHERE commentaire.idCommentaire = 1
-- 						   AND pouce.valeur = '+');


-- pour un joueur donn�, la liste des commentaires se r�f�rant � un jeu dans sa cat�gorie pr�f�r�e,
-- disponible sur sa plateforme pr�f�r�e ;


