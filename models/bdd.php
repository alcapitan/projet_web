<?php

/** 
 * Classe Bdd pour gérer une connexion unique à la base de données.
 */
class Bdd
{
    private static ?PDO $connexion = null;

    /** 
     * Constructeur privé pour empêcher l'instanciation directe.
     */
    private function __construct()
    {
        // Adresse de la base de données
        $host = 'localhost';
        $dbname = 'etd';

        // Lecture des identifiants de connexion depuis un fichier sécurisé
        $config = parse_ini_file('config.ini', true);
        if (!$config || !isset($config['database']['user'], $config['database']['password'])) {
            throw new BddException("Erreur : fichier de configuration invalide ou manquant.");
        }

        $user = $config['database']['user'];
        $password = $config['database']['password'];

        try {
            // Connexion à la base de données
            self::$connexion = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new BddException("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /** 
     * Retourne l'instance unique de connexion PDO.
     * Si elle n'existe pas encore, elle est créée.
     */
    public static function getConnexion(): PDO
    {
        if (self::$connexion === null) {
            new self(); // Initialise la connexion si elle n'existe pas encore
        }
        return self::$connexion;
    }
}

/**
 * Exception personnalisée pour les erreurs lié à la communication avec la base de données.
 */
class BddException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
