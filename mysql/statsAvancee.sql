-- Classement des jeux COMMENTES AU MOINS UNE FOIS par moyenne ponderee decroissante puis par somme des IC des commentaires décroissante
SELECT nomJeu AS "Nom du jeu", MP AS "Moyenne pondérée", TotalIC AS "Total des Indices de Confiance des commentaires du jeu" FROM jeu NATURAL JOIN (
SELECT idJeu, ( SUM(note  * (1 + res.c)/(1 + res.d)) ) / ( SUM((1 + res.c)/(1 + res.d)) ) AS "MP", SUM((1 + res.c)/(1 + res.d)) AS "TotalIC" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       GROUP BY idJeu
       ORDER BY ( SUM(note  * (1 + res.c)/(1 + res.d)) ) / ( SUM((1 + res.c)/(1 + res.d)) ) DESC, SUM((1 + res.c)/(1 + res.d)) DESC) AS classement;