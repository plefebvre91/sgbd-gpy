-- Calcul de l'indice de confiance, avec les détails du calcul
SELECT idCommentaire, (1 + res.c) as "1+c", (1 + res.d) as "1+d", (1 + res.c)/(1 + res.d) as "Indice de confiance" FROM (
       SELECT commentaire.idCommentaire, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC;

-- -- Les idCommentaire selon leur indice de confiance
SELECT idCommentaire, (1 + res.c)/(1 + res.d) as "Indice de confiance" FROM (
       SELECT commentaire.idCommentaire, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC;