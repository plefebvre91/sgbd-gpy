-- Classement des jeux COMMENTES AU MOINS UNE FOIS par moyenne ponderee decroissante puis par somme des IC des commentaires décroissante
SELECT nomJeu as "Nom du jeu", moyennePonderee as "Moyenne pondérée" FROM jeu NATURAL JOIN (
SELECT idJeu, ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) AS "moyennePonderee" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       GROUP BY idJeu
       ORDER BY ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) DESC, sum((1 + res.c)/(1 + res.d)) DESC) as classement;

-- Classement des idJeu COMMENTES AU MOINS UNE FOIS par moyenne ponderee decroissante puis par somme des IC des commentaires décroissante
SELECT idJeu, ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) AS "Moyenne ponderee" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       GROUP BY idJeu
       ORDER BY ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) DESC, sum((1 + res.c)/(1 + res.d)) DESC;