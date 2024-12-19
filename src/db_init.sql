DROP DATABASE IF EXISTS ctf_db;

CREATE DATABASE IF NOT EXISTS ctf_db ;

USE ctf_db;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    token VARCHAR(255)
);

CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT
);

-- Ajouter un utilisateur admin pour les tests
INSERT INTO utilisateurs (username, password, token) VALUES ('admin', 'admin_pass', "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEiLCJuYW1lIjoiYWRtaW4iLCJyb2xlIjoiYWRtaW4ifQ.yB-57BIUYqYLNfNO1NBAPGU7hE37SDlU_Djog5MGg4M");
INSERT INTO utilisateurs (username, password, token) VALUES ('user', 'user_pass', "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjIiLCJuYW1lIjoidXNlciIsInJvbGUiOiJtZW1iZXIifQ.ko3v7J2eCtOHXEgxSjJKT0X3Ot75v_oYElRrdwpVc1I");
INSERT INTO commentaires (contenu) VALUES ('Commentaire 1');