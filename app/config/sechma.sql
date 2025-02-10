-- Active: 1739113479184@@127.0.0.1@5432@up_work

create DATABASE up_work;

 CREATE TABLE categorie (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50)
   
 ) ;

SELECT * FROM categorie;

CREATE TABLE tag (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50) ,
    description TEXT
 );
 CREATE TYPE status AS ENUM ('à faire','en cours','terminé');
 CREATE TABLE projet(
    id SERIAL PRIMARY KEY ,
    title VARCHAR (50),
    description TEXT,
    budget DECIMAL (10,2),
    date_debut Date ,
    date_fin date,
    status status ,
    categorie_id int,
    FOREIGN KEY  (categorie_id)  REFERENCES Categorie (id),
    client_id int,
    FOREIGN KEY  (client_id)  REFERENCES Users (id)
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
    status status
);

INSERT INTO categorie (name) 
VALUES ('Web Development');
INSERT INTO tag (name, description) 
VALUES ('Frontend', 'Frontend web development technologies');
CREATE TABLE tag (
    id SERIAL PRIMARY KEY ,
    name VARCHAR(50) ,
    description TEXT
 );

INSERT INTO Users (first_name, last_name, email, password, photo, bio, role)
VALUES ('John', 'Doe', 'john.doe@example.com', 'password123', 'john_doe.jpg', 'A passionate web developer', 'freelance');
INSERT INTO projet (title, description, budget, date_debut, date_fin, status, categorie_id, client_id)
VALUES 
('Website Redesign', 'A complete redesign of the company website', 5000.00, '2025-02-15', '2025-05-15', 'à faire', 1, 1);



drop table tag ;
drop table categorie ;
drop table projet ;
drop table projet_tag ;
