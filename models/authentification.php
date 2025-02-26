<?php
require_once 'bdd.php';

/**
 * Cette classe Authentification permet de s'inscrire, se connecter ou se déconnecter.
 */
class Authentification
{
    /**
     * Cette méthode permet de vérifier si un email est déjà utilisé.
     */
    private static function emailExiste($email): bool
    {
        // Récupération de la connexion à la base de données
        $connexion = Bdd::getConnexion();

        // Création de la requête SQL
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $connexion->prepare($sql);

        try {
            // Remplissage des variables de manière sécurisée
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();
            return $user ? true : false;
        } catch (PDOException $e) {
            throw new AuthentificationException("Erreur PostgreSQL lors de la connexion : " . $e->getMessage());
        }
    }

    /**
     * Cette méthode permet d'inscrire un utilisateur dans la base de données.
     */
    public static function inscription($email, $password, $prenom, $nom): AuthentificationRetour
    {
        // Récupération de la connexion à la base de données
        $connexion = Bdd::getConnexion();

        $listeErreurs = new AuthentificationRetour();

        // Validation des champs
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $listeErreurs->addError("L'email est invalide.");
        } else if (self::emailExiste($email)) {
            $listeErreurs->addError("L'email est déjà utilisé.");
        }
        if (empty($password) || strlen($password) < 6) {
            $listeErreurs->addError("Le mot de passe doit contenir au moins 6 caractères.");
        }
        if (empty($prenom) || empty($nom)) {
            $listeErreurs->addError("Le prénom et le nom sont obligatoires.");
        }

        // Si aucune erreur, insérer l'utilisateur dans la base de données
        if ($listeErreurs->hasNoErrors()) {
            // Formatage des données
            $email = strtolower($email);
            $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hashage du mot de passe pour la sécurité
            $prenom = strtolower($prenom);
            $nom = strtolower($nom);

            // Création de la requête SQL
            $sql = "INSERT INTO utilisateur (email, password, prenom, nom) 
                    VALUES (:email, :password, :prenom, :nom)";
            $stmt = $connexion->prepare($sql);

            try {
                // Remplissage des variables de manière sécurisée
                $stmt->execute([
                    ':email' => $email,
                    ':password' => $hashed_password,
                    ':prenom' => $prenom,
                    ':nom' => $nom
                ]);
                header('Location: index.php');
                exit();
            } catch (PDOException $e) {
                throw new AuthentificationException("Erreur PostgreSQL lors de la connexion : " . $e->getMessage());
            }
        }

        // Retourne les erreurs potentielles
        return $listeErreurs;
    }

    /**
     * Cette méthode permet de connecter un utilisateur.
     */
    public static function connexion($email, $password): AuthentificationRetour
    {
        // Récupération de la connexion à la base de données
        $connexion = Bdd::getConnexion();

        $listeErreurs = new AuthentificationRetour();

        // Validation des champs
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $listeErreurs->addError("L'email est invalide.");
        }
        if (empty($password)) {
            $listeErreurs->addError("Le mot de passe est obligatoire.");
        }

        // Si aucune erreur, vérifier les informations de connexion
        if ($listeErreurs->hasNoErrors()) {
            // Formatage des données
            $email = strtolower($email);

            // Création de la requête SQL
            $sql = "SELECT * FROM utilisateur WHERE email = :email";
            $stmt = $connexion->prepare($sql);

            try {
                // Remplissage des variables de manière sécurisée
                $stmt->execute([':email' => $email]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['password'])) {
                    // Démarrer la session
                    session_start();
                    $_SESSION['user'] = $user;

                    header('Location: index.php');
                    exit();
                } else {
                    $listeErreurs->addError("L'email ou le mot de passe est incorrect.");
                }
            } catch (PDOException $e) {
                throw new AuthentificationException("Erreur PostgreSQL lors de la connexion : " . $e->getMessage());
            }
        }

        // Retourne les erreurs
        return $listeErreurs;
    }

    /**
     * Cette méthode permet de déconnecter un utilisateur.
     */
    public static function deconnexion()
    {
        // Supprimer toutes les variables de session
        session_unset();
        // Détruire la session
        session_destroy();

        // Rediriger l'utilisateur
        header("Location: index.php");
        exit;
    }
}

/**
 * Classe simili exception pour les erreurs lié à l'authentification.
 * Les potentielles multiples erreurs doivent être retournées à l'interface d'authentification.
 */
class AuthentificationRetour
{
    private array $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function addError(string $error)
    {
        $this->errors[] = $error;
    }

    public function hasNoErrors(): bool
    {
        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

/**
 * Exception personnalisée pour les erreurs lié à l'authentification.
 */
class AuthentificationException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
