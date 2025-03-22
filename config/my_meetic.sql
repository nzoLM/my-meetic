DROP DATABASE IF EXISTS my_meetic;
CREATE DATABASE my_meetic;

USE my_meetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS user_log;
DROP TABLE IF EXISTS gender;
DROP TABLE IF EXISTS loisir;
DROP TABLE IF EXISTS loisir_user;

CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    email           VARCHAR(255)    NOT NULL UNIQUE,
    password        VARCHAR(60)     NOT NULL,
    firstname       VARCHAR(255)    NOT NULL,
    lastname        VARCHAR(255)    NOT NULL,
    birthdate       DATE            NOT NULL,
    phone_number    VARCHAR(10),    
    city            VARCHAR(255),
    country         VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE gender (
    id              INT             NOT NULL AUTO_INCREMENT,
    gender          VARCHAR(32)     NOT NULL,
    id_user         INT             NOT NULL UNIQUE,
    FOREIGN KEY (id_user) REFERENCES user(id),
    PRIMARY KEY (id)
);
CREATE TABLE user_log (
    id_user         INT             NOT NULL,
    active          INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE loisir (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL UNIQUE,
    PRIMARY KEY (id)
);
CREATE TABLE loisir_user (
    id_user         INT             NOT NULL,
    id_loisir       INT             NOT NULL,
    active          INT             NOT NULL,
    FOREIGN KEY (id_loisir) REFERENCES loisir(id),
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE description (
    id_user         INT             NOT NULL UNIQUE,
    description     VARCHAR(255)    NOT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id)
);

INSERT INTO loisir (name) VALUES ("Sport");
INSERT INTO loisir (name) VALUES ("Musique");
INSERT INTO loisir (name) VALUES ("Art");
INSERT INTO loisir (name) VALUES ("Cinema");
INSERT INTO loisir (name) VALUES ("Cuisine");