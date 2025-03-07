<?php
include_once '../models/bdd.php';

/**
 * Cette classe Reservation permet de gérer les réservations.
 */
class Reservation
{

    // CREATE TABLE reservation (
    //     id SERIAL PRIMARY KEY,
    //     utilisateur_id INTEGER NOT NULL REFERENCES utilisateur(id) ON DELETE CASCADE,
    //     boutique_id INTEGER NOT NULL REFERENCES boutique(id) ON DELETE CASCADE,
    //     activite_id INTEGER NOT NULL REFERENCES activite(id) ON DELETE CASCADE,
    //     date_heure TIMESTAMP NOT NULL, -- Date et heure de la réservation
    //     nb_participants INTEGER NOT NULL CHECK (nb_participants > 0)
    // );

    /**
     * Cette méthode permet de créer une réservation
     */
    public static function creerReservation(int $utilisateur_id, int $boutique_id, int $activite_id, string $date_heure, int $nb_participants): void
    {
        // Récupération de la connexion à la base de données
        $bdd = Bdd::getConnexion();

        // Création de la requête SQL
        $sql = "INSERT INTO reservation (utilisateur_id, boutique_id, activite_id, date_heure, nb_participants) 
                VALUES (:utilisateur_id, :boutique_id, :activite_id, :date_heure, :nb_participants)";
        $requete = $bdd->prepare($sql);

        // Exécution de la requête
        try {
            $requete->execute([
                ':utilisateur_id' => $utilisateur_id,
                ':boutique_id' => $boutique_id,
                ':activite_id' => $activite_id,
                ':date_heure' => $date_heure,
                ':nb_participants' => $nb_participants
            ]);
        } catch (PDOException $e) {
            throw new ReservationException("Erreur PostgreSQL lors de la création de la réservation : " . $e->getMessage());
        }
    }
}

/**
 * Exception personnalisée pour les erreurs lié aux réservations.
 */
class ReservationException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
