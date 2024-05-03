drop database webcup_laravel;
create database webcup_laravel;
use webcup_laravel;

create table utilisateur(
    id int primary key auto_increment,
    nom varchar(255),
    mdp varchar(255),
    privilege varchar(255)
);

insert into utilisateur(nom,mdp,privilege) values('admin','admin','admin');


create table categorie(
    id int primary key auto_increment,
    nom varchar(255),

);

insert into categorie(nom) values('C1');
insert into categorie(nom) values('C2');