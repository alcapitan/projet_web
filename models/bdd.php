<?php

/** 
 * Cette classe Bdd permet de se connecter à la base de données 
 * et de récupérer la connexion pour effectuer des requêtes SQL.
 */
class Bdd
{
    private static $instance = null;
    private $connexion;

    /** 
     * Constructeur de la classe Bdd
     * créé la connexion à la base de données
     */
    public function __construct()
    {
        // Adresse de la base de données
        $host = 'localhost';
        $dbname = 'etd';
        // Identifiants de connexion stockés de manière sécurisée
        $config = parse_ini_file('config.ini', true);
        if (!$config || !isset($config['database']['user'], $config['database']['password'])) {
            die("Erreur : fichier de configuration invalide ou manquant.");
        }
        $user = $config['database']['user'];
        $password = $config['database']['password'];

        try {
            // Connexion à la base de données
            $this->connexion = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
            // Activer les exceptions pour les erreurs de requête SQL
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /** 
     * On ne permet pas de faire plusieurs connexions en même temps à la base de données.
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Bdd();
        }
        return self::$instance;
    }

    /**
     * Retourne l'instance de connexion à la base de données.
     */
    public function getConnexion()
    {
        return $this->connexion;
    }
}
