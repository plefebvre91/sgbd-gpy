-- Mise a jour d'un joueur
-- Les IDs des plateformes est categorie preferees sont recuperes au prealable par une requete de selection

UPDATE joueur
SET nom=#nom_joueur#, prenom=#prenom_joueur#, mail=#mail#, idCategorie=#id_categorie#, idPlateforme=#id_plateforme# 
WHERE pseudo=#login#;

-- Mise a jour d'un jeu, d'abord par modification des valeurs dans la table jeu, puis eventuellement
-- par insertion des nouvelles plateformes et categories dans les tables correspondantes.
UPDATE jeu SET nomJeu='$name', idEditeur='$id_editor' WHERE idJeu='$idJeu'";
-- Insertion des nouvelles plateformes du jeu
-- En pratique cette requete est construite de maniere incrementale
INSERT INTO estDisponible VALUES  (#nouvelle_plateforme_1#, #id_jeu#, #date_sortie#),
       	    		  	  (#nouvelle_plateforme_2#, #id_jeu#, #date_sortie#),
				  ...
				  (#nouvelle_plateforme_n#, #id_jeu#, #date_sortie#);
-- Insertion des nouvelles categories du jeu
-- En pratique cette requete est construite de maniere incrementale
INSERT INTO estDisponible VALUES  (#nouvelle_categorie_1#, #id_jeu#, #date_sortie#),
       	    		  	  (#nouvelle_categorie_2#, #id_jeu#, #date_sortie#),
				  ...	     
				  (#nouvelle_categorie_n#, #id_jeu#, #date_sortie#);




-- Mise a jour d'un commentaire
UPDATE commentaire SET note=#note#, commentaire=#com#, idPlateforme=#id_plateforme#, idJeu=#id_jeu#, pseudo=#login#
WHERE idCommentaire=#id_commentaire_a_modifier#";