-- Active: 1739030975316@@127.0.0.1@5432@up_work

create DATABASE up_work;

 CREATE TABLE categorie (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50),
   
 ) ;

SELECT * FROM categorie;

CREATE TABLE tag (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50) 
    description TEXT
 );
 CREATE TYPE status AS ENUM ('à faire','en cours','terminé');
CREATE TABLE projet (
    id SERIAL PRIMARY KEY,
    title VARCHAR(50),
    description TEXT,
    budget DECIMAL(10,2),
    date_debut DATE,
    date_fin DATE,
    status status DEFAULT 'en cours',  -- Default value for status is 'en cours'
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id),
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES Users(id)
);
 CREATE TABLE projet_tag(
    tag_id INT,
    projet_id INT ,
    FOREIGN KEY (tag_id)  REFERENCES tag (id),
    FOREIGN KEY (projet_id)  REFERENCES projet (id) 
 );

 CREATE TYPE role AS ENUM ('client','freelance','admin');

CREATE TABLE Users (
    id SERIAL PRIMARY KEY ,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(255) UNIQUE,
    password varchar (50),
    photo VARCHAR (50),
    bio VARCHAR (255),
   role role
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
CREATE TYPE status AS ENUM ('payee','non payee');
CREATE TABLE paiement (
    id SERIAL PRIMARY KEY ,
    montant DOUBLE,
    date date,
    status status,
)


drop table tag ;
drop table categorie ;
drop table projet ;
drop table projet_tag ;
