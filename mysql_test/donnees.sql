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

insert into joueur values ('wandujar'    , 'andujar'    , 'william'  , 'william.andujar@enseirb-matmeca.fr'   ,  2, 5);
insert into joueur values ('nbelin'      , 'belin'      , 'nicolas'  , 'nicolas.belin@enseirb-matmeca.fr'     ,  3, 3);
insert into joueur values ('hbrunie'     , 'brunie'     , 'huge'     , 'hugo.brunie@enseirb-matmeca.fr'       ,  4, 1);
insert into joueur values ('jcatala'     , 'catala'     , 'julien'   , 'julien.catala@enseirb-matmeca.fr'     ,  5, 6);
insert into joueur values ('achoblet'    , 'choblet'    , 'anais'    , 'anais.choblet@enseirb-matmeca.fr'     ,  6, 1);
insert into joueur values ('ldauphin'    , 'dauphin'    , 'loic'     , 'loic.dauphin@enseirb-matmeca.fr'      ,  7, 3);
insert into joueur values ('ygarbage'    , 'garbage'    , 'yvon'     , 'yvon.garbage@enseirb-matmeca.fr'      ,  8, 1);
insert into joueur values ('sguitouni'   , 'guitouni'   , 'souhaib'  , 'souhaib.guitouni@enseirb-matmeca.fr'  ,  9, 7);
insert into joueur values ('phennequin'  , 'hennequin'  , 'philippe' , 'philippe.hennequin@enseirb-matmeca.fr', 10, 1);
insert into joueur values ('mherbreteau' , 'herbreteau' , 'maxime'   , 'maxime.herbreteau@enseirb-matmeca.fr' , 11, 7);
insert into joueur values ('klabourdette', 'labourdette', 'kevin'    , 'kevin.labourdette@enseirb-matmeca.fr' ,  1, 1);
insert into joueur values ('plefebvre'   , 'lefebvre'   , 'pierre'   , 'pierre.lefebvre@enseirb-matmeca.fr'   ,  1, 1);
insert into joueur values ('imhamdi'     , 'mhamdi'     , 'imen'     , 'imen.mhamdi@enseirb-matmeca.fr'       ,  1, 1);
insert into joueur values ('ymentagui'   , 'mentagui'   , 'yassine'  , 'yassine.mentagui@enseirb-matmeca.fr'  ,  1, 1);
insert into joueur values ('rmillet'     , 'millet'     , 'remi'     , 'remi.millet@enseirb-matmeca.fr'       ,  1, 1);
insert into joueur values ('gpichon'     , 'pichon'     , 'gregoire' , 'gregoire.pichon@enseirb-matmeca.fr'   ,  1, 1);
insert into joueur values ('grollin'     , 'rollin'     , 'guillaume', 'guillaume.rollin@enseirb-matmeca.fr'  ,  1, 1);


-- TABLE commentaire
-- insert into commentaire values (idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme);

insert into commentaire values ( 1,  8, 'bof bof'                                , '2013-01-01', 'wandujar'    , 10, 1);
insert into commentaire values ( 2, 10, 'mouais'                                 , '2013-11-01', 'nbelin'      , 10, 3);
insert into commentaire values ( 3, 12, 'moyen'                                  , '2013-02-01', 'hbrunie'     , 10, 5);
insert into commentaire values ( 4,  6, 'pourri'                                 , '2014-01-01', 'jcatala'     , 11, 1);
insert into commentaire values ( 5, 18, 'fantastique'                            , '2014-01-14', 'achoblet'    , 11, 7);
insert into commentaire values ( 6, 20, 'ne peux plus dormir...'                 , '2014-04-01', 'ldauphin'    , 12, 1);
insert into commentaire values ( 7,  4, 'lol la roulade'                         , '2014-04-05', 'ygarbage'    , 12, 7);
insert into commentaire values ( 8, 14, 'pas mal'                                , '2013-01-01', 'sguitouni'   , 12, 3);
insert into commentaire values ( 9,  6, 'pourquoi tant de haine?'                , '2013-11-01', 'ldauphin'    , 12, 5);
insert into commentaire values (10, 17, 'parfait'                                , '2013-02-01', 'mherbreteau' , 13, 4);
insert into commentaire values (11, 13, 'cool a jouer'                           , '2014-01-01', 'klabourdette', 13, 5);
insert into commentaire values (12, 11, 'design nul'                             , '2014-01-14', 'plefebvre'   , 14, 1);
insert into commentaire values (13, 20, 'occupe ma vie'                          , '2014-04-01', 'imhamdi'     , 14, 4);
insert into commentaire values (14, 18, 'trop bien'                              , '2014-04-05', 'ymentagui'   , 14, 5);
insert into commentaire values (15, 18, 'j adore'                                , '2013-01-01', 'rmillet'     , 15, 1);
insert into commentaire values (16,  5, 'euh..'                                  , '2013-11-01', 'gpichon'     , 15, 7);
insert into commentaire values (17, 10, 'non'                                    , '2013-02-01', 'grollin'     , 16, 1);
insert into commentaire values (18,  8, 'pas top, vraiment pas top'              , '2014-01-01', 'wandujar'    , 16, 3);
insert into commentaire values (19,  9, 'non'                                    , '2014-01-14', 'wandujar'    , 16, 5);
insert into commentaire values (20, 13, 'passe le temps mais pas trop longtemps' , '2014-04-01', 'ldauphin'    , 16, 7);

commit;


-- TABLE pouce
-- insert into pouce values (idPouce, valeur, pseudo, idCommentaire);

insert into pouce values (1, '+', 'ygarbage' , 1);
insert into pouce values (2, '-', 'plefebvre', 1);
insert into pouce values (3, '+', 'ygarbage' , 6);
insert into pouce values (4, '+', 'gpichon'  , 5);
insert into pouce values (5, '+', 'plefebvre', 6);

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
