<?php
//Recuperation des n derniers commentaires
function get_last_comments($nb_comments) {
  $nb_comments = ($nb_comments <= 0) ? 1:$nb_comments;
  
  $query = "SELECT * FROM commentaire ORDER BY commentaire.dateCommentaire DESC LIMIT $nb_comments";
  $result = mysql_query($query) or die(mysql_error());

  return $result;
}


//Les joueurs classes selon le nombre de jeux qu'ils ont note, et le nombre de jeux qu'ils ont note
function get_active_players(){
  $query = "SELECT joueur.pseudo, COUNT(commentaire.pseudo) AS 'NbJeuxNotes' FROM commentaire INNER JOIN joueur 
            ON commentaire.pseudo = joueur.pseudo GROUP BY commentaire.pseudo 
            ORDER BY COUNT(commentaire.pseudo) DESC, commentaire.pseudo ASC";

  $result = mysql_query($query) or die (mysql_error());
  
  return $result;
}

//Commentaires selon leur appréciation
function get_comments_by_appreciation(){
  $query = "SELECT idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme, (1 + res.c)/(1 + res.d) AS indiceConfiance FROM (
       SELECT commentaire.*, SUM(IF(pouce.valeur = '+', 1, 0)) AS c, SUM(IF(pouce.valeur = '-', 1, 0)) AS d
       FROM commentaire LEFT OUTER JOIN pouce ON commentaire.idCommentaire = pouce.idCommentaire
       GROUP BY commentaire.idCommentaire) AS res
       ORDER BY (1 + res.c)/(1 + res.d) DESC, res.dateCommentaire DESC";


  $result = mysql_query($query) or die(mysql_error());

  return $result;
}

function get_most_attractive_comment(){
  $query = "SELECT distinct commentaire.* FROM pouce INNER JOIN commentaire ON pouce.idCommentaire = commentaire.idCommentaire
       WHERE pouce.idCommentaire IN
       (SELECT idCommentaire FROM pouce GROUP BY pouce.idCommentaire HAVING count(*) = (SELECT count(*) FROM pouce GROUP BY pouce.idCommentaire ASC LIMIT 1))";
  
  $result = mysql_query($query) or die(mysql_error());
  
  return $result;
}
       

?>
