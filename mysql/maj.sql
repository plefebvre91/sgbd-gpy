--Selection idEditeur par son nom (1):
SELECT editeur.idEditeur WHERE editeur.nomEditeur='nom';

--Selection idPlateforme par son nom (2):
SELECT plateforme.idPlateforme WHERE plateforme.nomPlateforme='nom';

--Selection idCategorie par son nom (3):
SELECT categorie.idCategorie WHERE categorie.nomCategorie='nom';

--Selection idJeu par son nom (4):
SELECT jeu.idJeu WHERE jeu.nomJeu='nom';

--Selection de idPlateforme depuis nomJeu (5)
SELECT plateforme LEFT INNER JOIN jeu 
ON plateforme.idPlateforme = jeu.idJeu
WHERE jeu.nomJeu='nomDuJeu';

--Ajout d'un jeu
-- idEditeur = selection avec (1)
-- idPlateforme = selection avec (2)
-- idCategorie = selection avec (3)
INSERT INTO jeu VALUES ('', 'NomDuJeu', idEditeur);
-- idJeu = recuperation du dernier id de jeu insere en PHP ou avec 
INSERT INTO estDisponible VALUES (idPlateforme, idJeu);
INSERT INTO appartient VALUES (idCategorie,  idJeu);

-- Ajout d'un joueur
-- idPlateforme preferee = selection avec (2)
-- idCategorie preferee = selection avec (3)
INSERT INTO joueur VALUES ('', 'nom', 'prenom', 'mail', idPlateforme, idCategorie);


-- Ajout commentaire
-- idJeu = selection avec (4)
-- idPlateforme = selection avec (5)
INSERT INTO commentaire ('', 'note', 'commentaire', 'date', 'pseudo', idJeu, idPlateforme);

-- Ajout plateforme
INSERT INTO plateforme ('', 'nom');

-- Ajout Editeur
INSERT INTO editeur ('','nom');

-- Ajout Categorie
INSERT INTO categorie ('', 'nom');

--------------------- MISE A JOUR -------------------
--Mise a jour d'un joueur
--Pour le changement des preferences
--idPlateforme = selection avec (2)
--idCategorie = selection avec (3)

UPDATE joueur
SET nom='nom', prenom='prenom', mail='mail', idCategorie='nouvel_id', idPlateforme='nouvel_id'
WHERE pseudo='le_pseudo';

--Mise a jour d'un jeu
--Pour le changement d'editeur
--idEditeur = selection avec (1)
UPDATE jeu
SET nomJeu='nom', idEditeur='nouvel_id'
WHERE idJeu='id';


--Mise a jour d'un commentaire
--Pour le changement d'editeur
--idPlateforme = selection avec (2)
UPDATE commentaire
SET note='nouvelle_note', commentaire='nouveau_commentaire', idPlateforme='nouvel_id'
WHERE idCommentaire='idCommentaire';



------------------------- SUPPRESSION ------------------
--La coherence est gardee avec les 'ON DELETE CASCADE' dans la creation des tables
DELETE FROM 'nom_de_la_table' WHERE nom_de_la_cle='id';