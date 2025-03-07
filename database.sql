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
INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES ('boyer', 'alexandre', 'alexandre.boyer29@gmail.com', '$2y$10$muCzN0IRd4Feb8csE1Gs8ewnoQ.pDueRqvbqGWYhMpwwxsEBkDpka', 'admin');
INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES ('bouix', 'clément', 'clement.perso@gmail.com', '$2y$10$fCfy/7NG3pfFVo5bNYz2E.LkTGfsV2mTgwqoPd8eDdIpJNxgYXwmy', 'admin');
INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES ('test', 'test', 'test@mail.fr', '$2y$10$muCzN0IRd4Feb8csE1Gs8ewnoQ.pDueRqvbqGWYhMpwwxs', 'client');


-- lieux physiques des escape games
CREATE TABLE boutique (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    adresse TEXT NOT NULL
);
INSERT INTO boutique (nom, adresse) VALUES ('Escape Game de Rennes', '1 rue de la soif, 35000 Rennes');
INSERT INTO boutique (nom, adresse) VALUES ('Escape Game de Paris', '2 rue de la soif, 75000 Paris');

-- salles disponibles dans une boutique
CREATE TABLE activite (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description TEXT,
    duree INTEGER NOT NULL CHECK (duree > 0), -- Durée en minutes
    boutique_id INTEGER NOT NULL REFERENCES boutique(id) ON DELETE CASCADE
);
INSERT INTO activite (nom, description, duree, boutique_id) VALUES ('La mine abandonnée', 'Vous êtes enfermés dans une mine abandonnée, vous avez 60 minutes pour en sortir', 60, 1);
INSERT INTO activite (nom, description, duree, boutique_id) VALUES ('Le manoir hanté', 'Vous êtes enfermés dans un manoir hanté, vous avez 60 minutes pour en sortir', 90, 1);
INSERT INTO activite (nom, description, duree, boutique_id) VALUES ('La prison de Rennes', 'Vous êtes enfermés dans la prison de Rennes, vous avez 60 minutes pour en sortir', 45, 2);
INSERT INTO activite (nom, description, duree, boutique_id) VALUES ('La maison de la terreur', 'Vous êtes enfermés dans une maison de la terreur, vous avez 60 minutes pour en sortir', 90, 2);


-- réservations des clients
CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    utilisateur_id INTEGER NOT NULL REFERENCES utilisateur(id) ON DELETE CASCADE,
    boutique_id INTEGER NOT NULL REFERENCES boutique(id) ON DELETE CASCADE,
    activite_id INTEGER NOT NULL REFERENCES activite(id) ON DELETE CASCADE,
    date_heure TIMESTAMP NOT NULL, -- Date et heure de la réservation
    nb_participants INTEGER NOT NULL CHECK (nb_participants > 0)
);
INSERT INTO reservation (utilisateur_id, boutique_id, activite_id, date_heure, nb_participants) VALUES (3, 1, 1, '2024-06-01 14:00:00', 4);
INSERT INTO reservation (utilisateur_id, boutique_id, activite_id, date_heure, nb_participants) VALUES (3, 1, 2, '2024-06-02 16:00:00', 6);
INSERT INTO reservation (utilisateur_id, boutique_id, activite_id, date_heure, nb_participants) VALUES (3, 2, 3, '2024-06-03 18:00:00', 3);
INSERT INTO reservation (utilisateur_id, boutique_id, activite_id, date_heure, nb_participants) VALUES (3, 2, 4, '2024-06-04 20:00:00', 5);