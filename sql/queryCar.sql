DROP DATABASE IF EXISTS frameworksenac;
CREATE DATABASE frameworksenac;
USE frameworksenac;

CREATE TABLE IF NOT EXISTS car(
    id_carro INTEGER PRIMARY KEY AUTO_INCREMENT,
    carName VARCHAR(255),
    model VARCHAR(255)
);