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

insert into joueur values ('joueur1', 'nom1', 'prenom1', 'mail1', 1, 1);
insert into joueur values ('joueur2', 'nom2', 'prenom2', 'mail2', 1, 2);
insert into joueur values ('joueur3', 'nom3', 'prenom3', 'mail3', 1, 3);
insert into joueur values ('joueur4', 'nom4', 'prenom4', 'mail4', 3, 2);
insert into joueur values ('joueur5', 'nom5', 'prenom5', 'mail5', 3, 3);


commit;


-- TABLE commentaire
-- insert into commentaire values (idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme);

insert into commentaire values (1, 12, 'potable'        , '2013-01-01', 'joueur1', 1, 1);
insert into commentaire values (2,  8, 'nul'            , '2013-11-01', 'joueur1', 1, 2);
insert into commentaire values (3, 18, 'genial, parfait', '2013-02-01', 'joueur1', 1, 3);
insert into commentaire values (4, 11, 'bof'            , '2014-01-01', 'joueur2', 2, 2);
insert into commentaire values (5,  4, 'lol'            , '2014-01-14', 'joueur3', 3, 3);
insert into commentaire values (6, 16, 'cool'           , '2014-04-01', 'joueur4', 4, 1);

commit;


-- TABLE pouce
-- insert into pouce values (idPouce, valeur, pseudo, idCommentaire);

insert into pouce values (1, '+', 'joueur2', 1);
insert into pouce values (2, '-', 'joueur3', 1);
insert into pouce values (3, '+', 'joueur4', 6);
insert into pouce values (4, '+', 'joueur1', 5);
insert into pouce values (5, '+', 'joueur1', 6);

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
