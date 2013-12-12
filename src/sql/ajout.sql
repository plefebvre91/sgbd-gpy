-- Ajout d'un jeu
--Le jeu est d'abord ajoute dans la table jeu
INSERT INTO jeu VALUES ('', '$name', '$id_editor');
-- L'identifiant du dernier jeu inserer est recupere avec une requete de selection sur le nom du jeu
-- des problemes etaient apparus lors de l'utilisation de LAST_INSERT_ID().
-- Cet identifiant servira pour les insertions dans les tables estDisponible et appartient
  
-- Insertion des plateformes du jeu
-- En pratique cette requete est construite de maniere incrementale
INSERT INTO estDisponible VALUES  (#plateforme_1#, #id_jeu#, #date_sortie#),
       	    		  	  (#plateforme_2#, #id_jeu#, #date_sortie#),
				  ...
				  (#plateforme_n#, #id_jeu#, #date_sortie#);

-- Insertion des nouvelles categories du jeu
-- En pratique cette requete est construite de maniere incrementale
INSERT INTO estDisponible VALUES  (#categorie_1#, #id_jeu#, #date_sortie#),
       	    		  	  (#categorie_2#, #id_jeu#, #date_sortie#),
				  ... 
				  (#categorie_n#, #id_jeu#, #date_sortie#);





-- Ajout d'un joueur --
INSERT INTO joueur VALUES (#login#, #nom#, #prenom#, #mail#, #id_categorie_preferee#, #id_plateforme_preferee#);

-- Ajout d'un editeur
-- Le champ id (cle primaire) est auto-incremente
INSERT INTO  editeur VALUES ('', #nom#);

-- Ajout d'un plateforme
-- Le champ id (cle primaire) est auto-incremente
INSERT INTO  plateforme VALUES ('', #nom#);

-- Ajout d'un categorie
-- Le champ id (cle primaire) est auto-incremente
INSERT INTO  categorie VALUES ('', #nom#);

-- Ajout d'un commentaire
-- Une verification est effectuee au prealable pour s'assurer que le jeu sur lequel porte le commentaire est bien
-- disponible sur la plateforme sur laquelle porte le commentaire
INSERT INTO commentaire VALUES ('', #note#, #com#, (SELECT CURDATE()), #pseudo#, #id_jeu#, #id_plateforme#);


-- Ajout d'une appreciation de commentaire
-- On recupere le pseudonyme de l'auteur du commentaire a apprecie pour verifier qu'il ne vote pas pour son propre commentaire
SELECT pseudo FROM commentaire WHERE idCommentaire=#id_comment;
-- Apres verification on insere l'appreciation dans la table correspondante
INSERT INTO pouce VALUES ('', #valeur_appreciation#, #pseudo#, #id_commentaire#)";
