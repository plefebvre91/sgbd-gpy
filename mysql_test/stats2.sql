-- La liste des n commentaires les plus recents
SELECT * FROM commentaire
ORDER BY commentaire.dateCommentaire DESC
LIMIT 4; -- Todo : 4 a remplacer par le parametre n