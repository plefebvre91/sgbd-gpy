-- le commentaire qui laisse le moins indiff�rent (celui qui a re�u le plus de jugements) ;
SELECT distinct commentaire.* FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       where pouce.idCommentaire in
       (SELECT idCommentaire FROM pouce GROUP BY pouce.idCommentaire HAVING count(*) = (SELECT count(*) FROM pouce GROUP BY pouce.idCommentaire ASC LIMIT 1));
       