-- Suppression des données

delete from appartient;
delete from estDisponible;
delete from pouce;
delete from commentaire;
delete from joueur;
delete from jeu;
delete from categorie;
delete from plateforme;
delete from editeur;

commit;


-- Création des données


-- TABLE editeur
-- insert into editeur values(idEditeur, nomEditeur);

insert into editeur values (1, 'Editeur A');
insert into editeur values (2, 'Editeur B');
insert into editeur values (3, 'Editeur C');

commit;


-- TABLE plateforme
-- insert into plateforme values (idPlateforme, nomPlateForme);

insert into plateforme values (1, 'Plateforme A');
insert into plateforme values (2, 'Plateforme B');
insert into plateforme values (3, 'Plateforme C');

commit;


-- TABLE categorie
-- insert into categorie values (idCategorie, nomCategorie);

insert into categorie values (1, 'Categorie A');
insert into categorie values (2, 'Categorie B');
insert into categorie values (3, 'Categorie C');
insert into categorie values (4, 'Categorie D');

commit;


-- TABLE jeu
-- insert into jeu values (idJeu, nomJeu, idEditeur);

insert into jeu values (1, 'Jeu A', 1);
insert into jeu values (2, 'Jeu B', 2);
insert into jeu values (3, 'Jeu C', 3);
insert into jeu values (4, 'Jeu D', 1);
insert into jeu values (5, 'Jeu E', 2);
insert into jeu values (6, 'Jeu F', 3);
insert into jeu values (7, 'Jeu G', 1);
insert into jeu values (8, 'Jeu H', 2);

commit;


-- TABLE joueur
-- insert into joueur values (pseudo, nom, prenom, mail, idCategorie, idPlateforme);

commit;


-- TABLE commentaire
-- insert into commentaire values (idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme);

commit;


-- TABLE pouce
-- insert into pouce values (idPouce, valeur, pseudo, idCommentaire);

commit;


-- TABLE estDisponible
-- insert into estDisponible values(idPlateforme, idJeu);

insert into estDisponible values(1, 1);
insert into estDisponible values(2, 2);
insert into estDisponible values(3, 3);
insert into estDisponible values(1, 4);
insert into estDisponible values(2, 5);
insert into estDisponible values(3, 6);
insert into estDisponible values(1, 7);
insert into estDisponible values(2, 8);

-- Jeu 1 sur toutes les plateformes
insert into estDisponible values(2, 1);
insert into estDisponible values(3, 1);

-- Jeu 2 sur plateformes 2 et 3
insert into estDisponible values(3, 2);

commit;


-- TABLE appartient
-- insert into appartient values(idCategorie, idJeu);

insert into appartient values(1, 1);
insert into appartient values(2, 2);
insert into appartient values(3, 3);
insert into appartient values(1, 4);
insert into appartient values(2, 5);
insert into appartient values(3, 6);
insert into appartient values(1, 7);
insert into appartient values(2, 8);

-- Jeu 1 appartient à toutes les catégories
insert into appartient values(2, 1);
insert into appartient values(3, 1);

-- Jeu 2 appartient aux catégories B et C
insert into appartient values(3, 2);

commit;


-- Vérification des données
