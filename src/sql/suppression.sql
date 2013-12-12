-- Les suppressions sont effectues en cascade

-- Supprime le commentaire ayant l'id correspondant (et les champs des tables qui en dependent)
DELETE FROM commentaire WHERE idCommentaire = #id_commentaire#";

-- Supprime le jeu ayant l'id correspondant (et les champs des tables qui en dependent)
DELETE FROM jeu WHERE idJeu=#id_jeu#;

-- Supprime le joueur ayant le pseudo correspondant
DELETE FROM joueur WHERE pseudo=#pseudo#;
