-- ESSAI qui fonctionne le 08/11/2013

-- Supression des tables qui existent déjà
-- Rq : Il semble que l'ordre soit important.
--      On ne peut pas supprimer JOUEUR avant POUCE,
--      car une des colonnes de JOUEUR est un clé étrangère de POUCE.

drop table if exists appartient;
drop table if exists estDisponible;
drop table if exists pouce;
drop table if exists commentaire;
drop table if exists joueur;
drop table if exists jeu;
drop table if exists categorie;
drop table if exists plateforme;
drop table if exists editeur;

-- Création des tables

CREATE TABLE joueur (
  pseudo       VARCHAR(32) NOT NULL,
  nom          VARCHAR(32) NOT NULL,
  prenom       VARCHAR(32) NOT NULL,
  mail         VARCHAR(64) NOT NULL,
  idCategorie  int         NOT NULL,
  idPlateforme int         NOT NULL,
  CONSTRAINT pk_joueur PRIMARY KEY(pseudo)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE pouce (
  idPouce       int NOT NULL AUTO_INCREMENT,
  valeur        CHAR(1),
  pseudo        VARCHAR(32),
  idCommentaire int,
  CONSTRAINT pk_pouce PRIMARY KEY(idPouce),
  CONSTRAINT uc_pouce UNIQUE (pseudo, idCommentaire)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE commentaire (
  idCommentaire   int NOT NULL AUTO_INCREMENT,
  note            int NOT NULL,
  commentaire     VARCHAR(140) NOT NULL,
  dateCommentaire date,
  pseudo          VARCHAR(32)  NOT NULL,
  idJeu           int,
  idPlateforme    int,
  CONSTRAINT pk_commentaire PRIMARY KEY(idCommentaire)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE categorie (
  idCategorie  int NOT NULL AUTO_INCREMENT,
  nomCategorie VARCHAR(128) UNIQUE,	
  CONSTRAINT pk_categorie PRIMARY KEY(idCategorie)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE jeu (
  idJeu     int NOT NULL AUTO_INCREMENT,
  nomJeu    VARCHAR(128) NOT NULL,	
  idEditeur int,
  CONSTRAINT pk_jeu PRIMARY KEY(idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE plateforme (
  idPlateforme  int NOT NULL AUTO_INCREMENT,
  nomPlateforme VARCHAR(128) UNIQUE,	
--  dateSortie date,
  CONSTRAINT pk_plateforme PRIMARY KEY(idPlateforme)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE editeur (
  idEditeur  int NOT NULL AUTO_INCREMENT,
  nomEditeur VARCHAR(128) NOT NULL,	
  PRIMARY KEY(idEditeur)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE appartient (
  idCategorie int,
  idJeu       int,
  CONSTRAINT pk_appartient PRIMARY KEY(idCategorie, idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE estDisponible (
  idPlateforme int,
  idJeu        int,
  dateSortie   date,
  CONSTRAINT pk_estDisponible PRIMARY KEY(idPlateforme, idJeu)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- Définitions des clés étrangères
ALTER TABLE estDisponible ADD CONSTRAINT fk1_estDisponible FOREIGN KEY (idJeu)         REFERENCES jeu   (idJeu)  ON DELETE CASCADE;

ALTER TABLE appartient    ADD CONSTRAINT fk1_appartient    FOREIGN KEY (idJeu)         REFERENCES jeu   (idJeu)  ON DELETE CASCADE; 

ALTER TABLE joueur        ADD CONSTRAINT fk1_joueur        FOREIGN KEY (idCategorie)   REFERENCES categorie   (idCategorie); 
ALTER TABLE joueur        ADD CONSTRAINT fk2_joueur        FOREIGN KEY (idPlateforme)  REFERENCES plateforme  (idPlateforme); 
		        								  					                     
ALTER TABLE commentaire   ADD CONSTRAINT fk1_commentaire   FOREIGN KEY (pseudo)        REFERENCES joueur      (pseudo)	  ON DELETE CASCADE; 
ALTER TABLE commentaire   ADD CONSTRAINT fk2_commentaire   FOREIGN KEY (idJeu)         REFERENCES jeu         (idJeu)	  ON DELETE CASCADE; 
ALTER TABLE commentaire   ADD CONSTRAINT fk3_commentaire   FOREIGN KEY (idPlateforme)  REFERENCES plateforme  (idPlateforme)  ON DELETE CASCADE; 
		        								  					                     
ALTER TABLE jeu           ADD CONSTRAINT fk1_jeu           FOREIGN KEY (idEditeur)     REFERENCES editeur     (idEditeur); 
		        								  					                     
ALTER TABLE pouce         ADD CONSTRAINT fk1_pouce         FOREIGN KEY (pseudo)        REFERENCES joueur      (pseudo)	  ON DELETE CASCADE; 
ALTER TABLE pouce         ADD CONSTRAINT fk2_pouce         FOREIGN KEY (idCommentaire) REFERENCES commentaire (idCommentaire) ON DELETE CASCADE; 


CREATE OR REPLACE VIEW info_joueur AS
       (SELECT nom, prenom, mail, pseudo, nomCategorie, nomPlateforme 
       FROM ((joueur NATURAL JOIN categorie)
       	    	     NATURAL JOIN plateforme));

CREATE OR REPLACE VIEW info_commentaires AS
       (SELECT idCommentaire, idJeu, idPlateforme, commentaire, note, dateCommentaire, pseudo, nomJeu, nomPlateforme
       FROM ((commentaire NATURAL JOIN plateforme) 
       	    		  NATURAL JOIN jeu));

