Create database ProjetS4;
use ProjetS4;

Create table user(
    id int unsigned auto_increment primary key,
    nom varchar(20),
    mdp varchar(50),
    mail varchar(50),
    genre varchar(50),
    taille double precision ,
    poid double precision,
    objectif varchar(50)
);

insert into user(nom,mdp) values('kevin','kevin');

insert into regime (nom,prix,tauxdefficacite) values('regime vegetarien',10000,4)

Create table exercices(
    id int unsigned auto_increment primary key,
    nom varchar(50),
    calories_par_rep double precision,
    
);
CREATE TABLE IF NOT EXISTS PLATS
 (
   IDPLAT INTEGER NOT NULL  ,
   TYPEPLAT SMALLINT NOT NULL,  
   nom varchar(50)
   , PRIMARY KEY (IDPLAT) 
 ) 
 insert into plats values(1,1,'petit dejeuner');
 insert into plats values(2,2,'dejeuner');
 insert into plats values(3,3,'diner');

CREATE TABLE IF NOT EXISTS REPAS
 (
   IDREPAS INT auto_increment  ,
   NOMREPAS VARCHAR(128) NULL  ,
   TYPEREPAS SMALLINT NOT NULL  ,
	POURCENTAGE_POISSON DECIMAL(10,2) NOT NULL,
	POURCENTAGE_VIANDE DECIMAL(10,2) NOT NULL,
   CALORIEDONEE DECIMAL(10,2) NOT NULL  
   , PRIMARY KEY (IDREPAS) 
 )
 CREATE TABLE IF NOT EXISTS typerepas
 (
   IDtyperepas INTEGER NOT NULL  ,
   nom varchar(50)
   , PRIMARY KEY (IDtyperepas) 
 );
 insert into typerepas values(1,'entree');
 insert into typerepas values(2,'resistance');
 insert into typerepas values(3,'dessert');