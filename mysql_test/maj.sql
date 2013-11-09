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
WHERE jeu.nomJeu='nomDuJeu'

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
