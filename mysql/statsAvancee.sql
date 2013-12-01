-- Classement des idJeu COMMENTES AU MOINS UNE FOIS par moyenne ponderee decroissante
SELECT idJeu, ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) AS "Moyenne ponderee" FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       GROUP BY idJeu
       ORDER BY ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) DESC;

-- Pour chaque jeu : somme des IC, somme des notes ponderees, et moyenne ponderee
-- SELECT idJeu, sum((1 + res.c)/(1 + res.d)) AS "Somme IC", sum(note  * (1 + res.c)/(1 + res.d)) AS "Somme notes ponderees",
-- ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) AS "Moyenne ponderee" FROM (
--        SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
--        FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
--        GROUP BY commentaire.idCommentaire) AS res
--        GROUP BY idJeu
--        ORDER BY ( sum(note  * (1 + res.c)/(1 + res.d)) ) / ( sum((1 + res.c)/(1 + res.d)) ) DESC;

-- -- Les idJeu et le total des notes non ponderees de chaque jeu, classe par idJeu
-- SELECT idJeu, sum(note) AS "Total notes" FROM (
-- SELECT idCommentaire, idJeu, note, (1 + res.c)/(1 + res.d) AS "Indice de confiance", note  * (1 + res.c)/(1 + res.d) AS "Note ponderee" FROM (
--        SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS "c", SUM(IF(pouce.valeur = '-', 1, 0)) AS "d"
--        FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
--        GROUP BY commentaire.idCommentaire) AS res
--        ORDER BY idJeu ASC) as result1
--        GROUP BY idJeu;