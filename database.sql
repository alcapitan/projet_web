DROP TABLE IF EXISTS utilisateur, boutique, activite, reservation;

-- COMMANDE POUR MISE A JOUR BDD
-- \i database.sql 

-- clients et administrateurs
CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(60) NOT NULL, -- Stocké en hashé Bcrypt
    role VARCHAR(20) NOT NULL DEFAULT 'client' CHECK (role IN ('client', 'admin')) -- Définition des rôles
);

-- lieux physiques des escape games
CREATE TABLE boutique (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    adresse TEXT NOT NULL
);

-- salles disponibles dans une boutique
CREATE TABLE activite (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT,
    duree INTEGER NOT NULL CHECK (duree > 0), -- Durée en minutes
    boutique_id INTEGER NOT NULL REFERENCES boutique(id) ON DELETE CASCADE
);

-- réservations des clients
CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER NOT NULL REFERENCES utilisateur(id) ON DELETE CASCADE,
    boutique_id INTEGER NOT NULL REFERENCES boutique(id) ON DELETE CASCADE,
    activite_id INTEGER NOT NULL REFERENCES activite(id) ON DELETE CASCADE,
    date_heure TIMESTAMP NOT NULL, -- Date et heure de la réservation
    nb_participants INTEGER NOT NULL CHECK (nb_participants > 0)
);