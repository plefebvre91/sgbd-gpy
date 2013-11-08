-- ESSAI qui fonctionne le 08/11/2013

-- Supression des tables qui existent déjà
-- Rq : Il semble que l'ordre soit important.
--      On ne peut pas supprimer JOUEUR avant POUCE,
--      car une des colonnes de JOUEUR est un clé étrangère de POUCE.

drop table if exists POUCE;
drop table if exists JOUEUR;

-- Création des tables

CREATE TABLE JOUEUR (
  pseudo VARCHAR(20),
  nom VARCHAR(20),
  prenom VARCHAR(20),
  mail VARCHAR(20),
  idCategorie int,
  idPlateforme int,
  PRIMARY KEY(pseudo)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE POUCE (
  idPouce int,
  valeur CHAR(1),
  pseudo VARCHAR(20),
  PRIMARY KEY(idPouce)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Définitions des clés étrangères

ALTER TABLE POUCE ADD FOREIGN KEY (pseudo) REFERENCES JOUEUR (pseudo);