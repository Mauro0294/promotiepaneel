DROP DATABASE IF EXISTS promotiepaneel;

CREATE DATABASE promotiepaneel;

USE promotiepaneel;

CREATE TABLE admins (
    id int(11) AUTO_INCREMENT,
    gebruikersnaam varchar(255),
    wachtwoord varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE werknemers (
    id int(11) AUTO_INCREMENT,
    naam varchar(255),
    functie varchar(255),
    PRIMARY KEY (id)
);