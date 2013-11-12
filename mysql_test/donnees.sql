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

insert into editeur values (1, 'Ubisoft');
insert into editeur values (2, 'Ankama');
insert into editeur values (3, 'Arkane Studios');
insert into editeur values (4, 'Asobo Studio');
insert into editeur values (5, 'Blizzard Entertainment');
insert into editeur values (6, 'Electronic Arts');
insert into editeur values (7, 'Valve Corporation');

commit;


-- TABLE plateforme
-- insert into plateforme values (idPlateforme, nomPlateForme);

insert into plateforme values (1 , 'PC Windows');
insert into plateforme values (2 , 'Xbox');
insert into plateforme values (3 , 'Xbox 360');
insert into plateforme values (4 , 'Play Station 2');
insert into plateforme values (5 , 'Play Station 3');
insert into plateforme values (6 , 'Wii');
insert into plateforme values (7 , 'OS X');
insert into plateforme values (8 , 'PSP');
insert into plateforme values (9 , 'Android');
insert into plateforme values (10, 'PC Linux');


commit;


-- TABLE categorie
-- insert into categorie values (idCategorie, nomCategorie);

insert into categorie values ( 1, 'MMORPG');
insert into categorie values ( 2, 'Simulation sportive');
insert into categorie values ( 3, 'Plate-forme');
insert into categorie values ( 4, 'Reflexion');
insert into categorie values ( 5, 'Jeu de rythme');
insert into categorie values ( 6, 'Tir en vue subjective');
insert into categorie values ( 7, 'Course');
insert into categorie values ( 8, 'Humour');
insert into categorie values ( 9, 'Action-aventure');
insert into categorie values (10, 'Hack n Slash');
insert into categorie values (11, 'Multijoueur');

commit;


-- TABLE jeu
-- insert into jeu values (idJeu, nomJeu, idEditeur);

insert into jeu values ( 1, 'Just Dance'        , 1);
insert into jeu values ( 2, 'Les lapins cretins', 1);
insert into jeu values ( 3, 'ShootMania'        , 1);
insert into jeu values ( 4, 'Dofus'             , 2);
insert into jeu values ( 5, 'Wakfu'             , 2);
insert into jeu values ( 6, 'Fly n'             , 2);
insert into jeu values ( 7, 'BioShock 2'        , 3);
insert into jeu values ( 8, 'Dishonored'        , 3);
insert into jeu values ( 9, 'Toy Story 3'       , 4);
insert into jeu values (10, 'Fuel'              , 4);
insert into jeu values (11, 'World of Warcraft' , 5);
insert into jeu values (12, 'Diablo III'        , 5);
insert into jeu values (13, 'FIFA football'     , 6);
insert into jeu values (14, 'NBA Live'          , 6);
insert into jeu values (15, 'Dota 2'            , 7);
insert into jeu values (16, 'Counter Strike'    , 7);

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
insert into commentaire values (7, 17, 'super cool'     , '2014-04-05', 'joueur4', 4, 1);

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

insert into estDisponible values(6, 1);
insert into estDisponible values(1, 2);
insert into estDisponible values(1, 3);
insert into estDisponible values(1, 4);
insert into estDisponible values(7, 4);
insert into estDisponible values(10, 4);
insert into estDisponible values(1, 5);
insert into estDisponible values(7, 5);
insert into estDisponible values(10, 5);
insert into estDisponible values(1, 6);
insert into estDisponible values(1, 7);
insert into estDisponible values(3, 7);
insert into estDisponible values(5, 7);
insert into estDisponible values(7, 7);
insert into estDisponible values(1, 8);
insert into estDisponible values(3, 8);
insert into estDisponible values(5, 8);
insert into estDisponible values(1, 9);
insert into estDisponible values(3, 9);
insert into estDisponible values(4, 9);
insert into estDisponible values(5, 9);
insert into estDisponible values(6, 9);
insert into estDisponible values(1, 10);
insert into estDisponible values(3, 10);
insert into estDisponible values(5, 10);
insert into estDisponible values(1, 11);
insert into estDisponible values(7, 11);
insert into estDisponible values(1, 12);
insert into estDisponible values(7, 12);
insert into estDisponible values(3, 12);
insert into estDisponible values(5, 12);
insert into estDisponible values(4, 13);
insert into estDisponible values(5, 13);
insert into estDisponible values(1, 14);
insert into estDisponible values(4, 14);
insert into estDisponible values(5, 14);
insert into estDisponible values(1, 15);
insert into estDisponible values(7, 15);
insert into estDisponible values(10, 15);
insert into estDisponible values(1, 16);
insert into estDisponible values(3, 16);
insert into estDisponible values(5, 16);
insert into estDisponible values(7, 16);

commit;


-- TABLE appartient
-- insert into appartient values(idCategorie, idJeu);

insert into appartient values(5, 1);
insert into appartient values(6, 2);
insert into appartient values(8, 3);
insert into appartient values(1, 4);
insert into appartient values(1, 5);
insert into appartient values(4, 6);
insert into appartient values(6, 7);
insert into appartient values(6, 8);
insert into appartient values(9, 9);
insert into appartient values(7, 10);
insert into appartient values(1, 11);
insert into appartient values(10, 12);
insert into appartient values(1, 13);
insert into appartient values(2, 14);
insert into appartient values(11, 15);
insert into appartient values(6, 16);
insert into appartient values(11, 16);

commit;


-- Vérification des données
