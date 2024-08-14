CREATE DATABASE desafio;

CREATE TABLE usuario (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL
);

select * from usuario;

DROP TABLE usuario;