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


-- TABLE joueur
-- insert into joueur values (pseudo, nom, prenom, mail, idCategorie, idPlateforme);

commit;


-- TABLE pouce
-- insert into pouce values (idPouce, valeur, pseudo, idCommentaire);

commit;


-- TABLE commentaire
-- insert into commentaire values (idCommentaire, note, commentaire, dateCommentaire, pseudo, idJeu, idPlateforme);

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

commit;


-- TABLE plateforme
-- insert into plateforme values (idPlateforme, nomPlateForme);

insert into plateforme values (1, 'Plateforme A');
insert into plateforme values (2, 'Plateforme B');
insert into plateforme values (3, 'Plateforme C');

commit;


-- TABLE editeur
-- insert into editeur values(idEditeur, nomEditeur);

commit;


-- TABLE appartient
-- insert into appartient values(idCategorie, idJeu);

commit;


-- TABLE estDisponible
-- insert into estDisponible values(idPlateforme, idJeu);

commit;


-- Vérification des données
