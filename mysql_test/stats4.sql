-- Nombre de pouces positifs pour chaque commentaire
SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
WHERE pouce.valeur = '+'
GROUP BY commentaire.idCommentaire;

-- Nombre de pouces negatifs pour chaque commentaire
SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
WHERE pouce.valeur = '-'
GROUP BY commentaire.idCommentaire;

-- Calcul de (1+c) pour chaque commentaire
SELECT idCommentaire, (1 + positifs.c) as "positif" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '+'
       GROUP BY commentaire.idCommentaire) as positifs;

-- Calcul de (1+d) pour chaque commentaire
SELECT idCommentaire, (1 + negatifs.d) as "negatif" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '-'
       GROUP BY commentaire.idCommentaire) as negatifs;

-- Essai de calcul de (1+c) et (1+d) a la fois
SELECT positifs.idCommentaire, (1 + positifs.c) as "1+c", (1 + negatifs.d) as "1+d" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '+'
       GROUP BY commentaire.idCommentaire) as positifs
LEFT OUTER JOIN (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '-'
       GROUP BY commentaire.idCommentaire) as negatifs
ON positifs.idCommentaire = negatifs.idCommentaire

UNION

SELECT positifs.idCommentaire, (1 + positifs.c) as "1+c", (1 + negatifs.d) as "1+d" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '+'
       GROUP BY commentaire.idCommentaire) as positifs
RIGHT OUTER JOIN (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '-'
       GROUP BY commentaire.idCommentaire) as negatifs
ON positifs.idCommentaire = negatifs.idCommentaire;



-- Autre essai
(
SELECT positifs.idCommentaire, (1 + positifs.c) as "1+c", (1 + negatifs.d) as "1+d" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '+'
       GROUP BY commentaire.idCommentaire) as positifs
LEFT OUTER JOIN (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '-'
       GROUP BY commentaire.idCommentaire) as negatifs
ON positifs.idCommentaire = negatifs.idCommentaire)

UNION

(
SELECT positifs.idCommentaire, (1 + positifs.c) as "1+c", (1 + negatifs.d) as "1+d" FROM (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "c" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '+'
       GROUP BY commentaire.idCommentaire) as positifs
RIGHT OUTER JOIN (
       SELECT commentaire.idCommentaire, COUNT(pouce.valeur) as "d" FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.valeur = '-'
       GROUP BY commentaire.idCommentaire) as negatifs
ON positifs.idCommentaire = negatifs.idCommentaire
);