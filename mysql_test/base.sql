-- ESSAI qui fonctionne le 08/11/2013

-- Supression des tables qui existent déjà
-- Rq : Il semble que l'ordre soit important.
--      On ne peut pas supprimer JOUEUR avant POUCE,
--      car une des colonnes de JOUEUR est un clé étrangère de POUCE.

drop table if exists joueur;
drop table if exists pouce;
drop table if exists commentaire;
drop table if exists categorie;
drop table if exists jeu;
drop table if exists plateforme;
drop table if exists editeur;
drop table if exists appartient;
drop table if exists estDisponible;


-- Création des tables

CREATE TABLE joueur (
  pseudo       VARCHAR(32),
  nom          VARCHAR(32),
  prenom       VARCHAR(32),
  mail         VARCHAR(32),
  idCategorie  int,
  idPlateforme int,
  PRIMARY KEY(pseudo)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE pouce (
  idPouce int NOT NULL AUTO_INCREMENT,
  valeur  CHAR(1),
  pseudo  VARCHAR(32),
  PRIMARY KEY(idPouce)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE commentaire (
  idCommentaire   int NOT NULL AUTO_INCREMENT,
  note            int;
  commentaire     VARCHAR(140);
  dateCommentaire date;
  PRIMARY KEY(idCommentaire)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE categorie (
  idCategorie  int NOT NULL AUTO_INCREMENT,
  nomCategorie VARCHAR(128);	
  PRIMARY KEY(idCategorie)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE jeu (
  idJeu  int NOT NULL AUTO_INCREMENT,
  nomJeu VARCHAR(128);	
  PRIMARY KEY(idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE plateforme (
  idPlateforme  int NOT NULL AUTO_INCREMENT,
  nomPlateForme VARCHAR(128);	
  PRIMARY KEY(idPlateforme)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE editeur (
  idEditeur  int NOT NULL AUTO_INCREMENT,
  nomEditeur VARCHAR(128);	
  PRIMARY KEY(idEditeur)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE appartient (
  idCategorie int;
  idJeu       int;
  PRIMARY KEY(idCategorie, idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE estDisponible (
  idPlateforme int;
  idJeu        int;
  PRIMARY KEY(idPlateforme, idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- Définitions des clés étrangères

ALTER TABLE joueur      ADD FOREIGN KEY (idCategorie)   REFERENCES categorie   (idCategorie);
ALTER TABLE joueur      ADD FOREIGN KEY (idPlateforme)  REFERENCES plateforme  (idPlateforme);

ALTER TABLE pouce       ADD FOREIGN KEY (pseudo)        REFERENCES joueur      (pseudo);
ALTER TABLE pouce       ADD FOREIGN KEY (idCommentaire) REFERENCES commentaire (idCommentaire);

ALTER TABLE commentaire ADD FOREIGN KEY (pseudo)        REFERENCES joueur      (pseudo);
ALTER TABLE commentaire ADD FOREIGN KEY (idJeu)         REFERENCES jeu         (idJeu);
ALTER TABLE commentaire ADD FOREIGN KEY (idPlateforme)  REFERENCES plateforme  (idPlateforme);

ALTER TABLE editeur     ADD FOREIGN KEY (idEditeur)     REFERENCES editeur     (idEditeur);