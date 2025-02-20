<?php
require_once 'bdd.php';

/**
 * Cette classe Authentification permet de s'inscrire, se connecter ou se déconnecter.
 */
class Authentification
{
    private PDO $connexion;

    /**
     * Constructeur de la classe Authentification
     * récupère la connexion à la base de données
     */
    public function __construct()
    {
        $bdd = Bdd::getInstance();
        $connexion = $bdd->getConnexion();
    }

    /**
     * Cette méthode permet d'inscrire un utilisateur dans la base de données.
     */
    public function inscription($email, $password, $prenom, $nom)
    {
        $errors = [];

        // Validation des champs
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email est invalide.";
        }
        if (empty($password) || strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
        }
        if (empty($prenom) || empty($nom)) {
            $errors[] = "Le prénom et le nom sont obligatoires.";
        }

        // Si aucune erreur, insérer l'utilisateur dans la base de données
        if (empty($errors)) {
            // Formatage des données
            $email = strtolower($email);
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $prenom = strtolower($prenom);
            $nom = strtolower($nom);

            // Création de la requête SQL
            $sql = "INSERT INTO utilisateur (email, password, prenom, nom) 
                    VALUES (:email, :password, :prenom, :nom)";
            $stmt = $this->connexion->prepare($sql);

            try {
                // Remplissage des variables de manière sécurisée
                $stmt->execute([
                    ':email' => $email,
                    ':password' => $hashed_password,
                    ':prenom' => $prenom,
                    ':nom' => $nom
                ]);
                //TODO: où rediriger ??
                exit();
            } catch (PDOException $e) {
                $errors[] = "Erreur PostgreSQL lors de l'inscription : " . $e->getMessage();
            }
        }

        // Retourne les erreurs
        return $errors;
    }

    /**
     * Cette méthode permet de connecter un utilisateur.
     */
    public function connexion($email, $password)
    {
        $errors = [];

        // Validation des champs
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email est invalide.";
        }
        if (empty($password)) {
            $errors[] = "Le mot de passe est obligatoire.";
        }

        // Si aucune erreur, vérifier les informations de connexion
        if (empty($errors)) {
            // Formatage des données
            $email = strtolower($email);

            // Création de la requête SQL
            $sql = "SELECT * FROM utilisateur WHERE email = :email";
            $stmt = $this->connexion->prepare($sql);

            try {
                // Remplissage des variables de manière sécurisée
                $stmt->execute([':email' => $email]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['password'])) {
                    // Démarrer la session
                    session_start();
                    $_SESSION['user'] = $user;

                    //TODO: où rediriger ??
                    exit();
                } else {
                    $errors[] = "Email ou mot de passe incorrect.";
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur PostgreSQL lors de la connexion : " . $e->getMessage();
            }
        }

        // Retourne les erreurs
        return $errors;
    }

    /**
     * Cette méthode permet de déconnecter un utilisateur.
     */
    public function deconnexion()
    {
        session_destroy();

        //TODO: où rediriger ??
        exit();
    }
}
