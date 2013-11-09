-- Les joueurs classes selon le nombre de jeux qu'ils ont note, et le nombre de jeux qu'ils ont note
SELECT joueur.pseudo AS "Joueurs selon le nombre de jeux notes", COUNT(commentaire.pseudo) AS "Nombre de jeux notes"
FROM commentaire INNER JOIN joueur ON commentaire.pseudo = joueur.pseudo
GROUP BY commentaire.pseudo
ORDER BY COUNT(commentaire.pseudo) DESC, commentaire.pseudo ASC;

-- Les joueurs classes selon le nombre de jeux qu'ils ont note
SELECT res.pseudo AS "Joueurs selon le nombre de jeux notes" FROM (
       SELECT joueur.pseudo, COUNT(commentaire.pseudo)
       FROM commentaire INNER JOIN joueur ON commentaire.pseudo = joueur.pseudo
       GROUP BY commentaire.pseudo
       ORDER BY COUNT(commentaire.pseudo) DESC, commentaire.pseudo ASC) AS res;
