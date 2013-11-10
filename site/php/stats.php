<?php
require("base.php");

//Recuperation des n derniers commentaires
function get_lasts_comments($nb_comments) {
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

?>
