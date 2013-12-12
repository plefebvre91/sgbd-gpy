-- Calcul de l'indice de confiance (IC), avec les détails du calcul, et classement selon IC decroissant
SELECT idCommentaire, (1 + res.c) AS "1+c", (1 + res.d) AS "1+d", (1 + res.c)/(1 + res.d) AS "Indice de confiance" FROM (
       SELECT commentaire.idCommentaire, commentaire.dateCommentaire,
       	      SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC, res.dateCommentaire DESC;

-- Les idCommentaire classes selon leur indice de confiance (IC) decroissant, et du plus au moins recent si IC est le même
SELECT idCommentaire, (1 + res.c)/(1 + res.d) AS "Indice de confiance" FROM (
       SELECT commentaire.idCommentaire, commentaire.dateCommentaire,
       	      SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC, res.dateCommentaire DESC;

-- Les commentaires classes selon leur indice de confiance (IC) decroissant, et du plus au moins recent si IC est le même
SELECT idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme, (1 + res.c)/(1 + res.d) AS "Indice de confiance" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC, res.dateCommentaire DESC;