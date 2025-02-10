-- Active: 1739025664745@@127.0.0.1@5432@up_work

create DATABASE up_work;

 CREATE TABLE categorie (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50)
 ) ;

SELECT * FROM categorie;

CREATE TABLE tag (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50) UNIQUE
 );
 CREATE TYPE status AS ENUM ('à faire','en cours','terminé');
 CREATE TABLE offre(
    id SERIAL PRIMARY KEY ,
    title VARCHAR (50),
    description TEXT,
    budget DECIMAL (10,2),
    date_debut Date ,
    date_fin date,
    status status ,
    categorie_id int,
    FOREIGN categirie_id  REFERENCES Categorie (id);
 );
 CREATE TABLE offre_tag(
    tag_id INT,
    offre_id INT ,
    FOREIGN tag_id  REFERENCES tag (id);
    FOREIGN offre_id  REFERENCES offre (id);  
 );

 CREATE TABLE role(
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(50)
 );
CREATE TABLE User (
    id SERIAL PRIMARY KEY ,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(255) UNIQUE,
    password varchar (50),
    photo VARCHAR (50),
    bio VARCHAR (255),
    role_id INT,
    Foreign Key (role_id) REFERENCES role (id)
);
CREATE TABLE competence(
    id SERIAL PRIMARY KEY ,
    name varchar(50),
    rating float
);
CREATE TABLE Avis (
    id SERIAL PRIMARY KEY,
    rating float ,
    date date
);
CREATE TABLE projet (
    id SERIAL PRIMARY KEY ,
    

);
CREATE TYPE status AS ENUM ('payee','non payee');
CREATE TABLE paiement (
    id SERIAL PRIMARY KEY ,
    montant DOUBLE,
    date date,
    status status,
)


