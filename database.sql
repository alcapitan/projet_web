DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    date_naissance DATE
);

-- \i database.sql