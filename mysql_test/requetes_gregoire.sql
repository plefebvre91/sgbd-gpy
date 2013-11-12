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
select pouce.pseudo from pouce inner join commentaire 
on pouce.idCommentaire = commentaire.idCommentaire
where commentaire.idCommentaire='5' and pouce.valeur='+';

-- pour un joueur donn�, la liste des commentaires se r�f�rant � un jeu dans sa cat�gorie pr�f�r�e,
-- disponible sur sa plateforme pr�f�r�e ;

-- SELECT commentaire.* FROM commentaire INNER JOIN jeu
--        ON commentaire.idJeu = jeu.idJeu
--        WHERE jeu.idJeu IN 
--        	     (SELECT jeu.idJeu FROM jeu WHERE jeu.idJeu IN
-- 	            (SELECT appartient.idJeu FROM appartient INNER JOIN jeu 
-- 		    	    ON jeu.idJeu = appartient.idJeu
-- 	       	     	    WHERE appartient.idCategorie = (SELECT idCategorie FROM joueur WHERE joueur.pseudo = 'joueur2')))
--        AND commentaire.idPlateforme IN
--        	   (SELECT idPlateforme FROM joueur WHERE joueur.pseudo = 'joueur2');



-- le commentaire qui laisse le moins indiff�rent (celui qui a re�u le plus de jugements) ;

SELECT distinct commentaire.* FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       where pouce.idCommentaire in
       (SELECT idCommentaire FROM pouce GROUP BY pouce.idCommentaire HAVING count(*) = (SELECT count(*) FROM pouce GROUP BY pouce.idCommentaire ASC LIMIT 1));
       