CREATE DATABASE desafio;

CREATE TABLE usuario (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    cadastrado VARCHAR(3) NOT NULL DEFAULT 'sim'
);

select * from usuario;

