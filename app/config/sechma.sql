-- Active: 1738935925918@@127.0.0.1@3306@crud

show DATABASEs;
create DATABASE crud;

use crud;

create Table people (
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(44),
    email VARCHAR(44)
);

drop Table people;

INSERT INTO people VALUES(null, "ahmed", "foullane@giam.com")

select * from `people`;

