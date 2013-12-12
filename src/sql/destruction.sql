-- Sélection de la base de données à utiliser, par sécurité

USE jeuxvideos;

-- Suppression des tables et des vues

drop table if exists appartient;
drop table if exists estDisponible;
drop table if exists pouce;
drop table if exists commentaire;
drop table if exists joueur;
drop table if exists jeu;
drop table if exists categorie;
drop table if exists plateforme;
drop table if exists editeur;
drop view if exists info_joueur; 
drop view if exists info_commentaires;

-- Suppression de la base de données

DROP DATABASE jeuxvideos;