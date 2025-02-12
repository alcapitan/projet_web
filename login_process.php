<?php
session_start();

// Connexion à la base de données PostgreSQL avec PDO
$host = 'pedago.univ-avignon.fr';
$dbname = 'etd';
$user = 'uapv2401629';
$password = 'OHY0CV';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname;sslmode=require", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des données du formulaire
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Requête pour vérifier les identifiants
$sql = "SELECT * FROM utilisateurs WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // Identifiants corrects, démarrage de la session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header("Location: dashboard.php");
    exit();
} else {
    // Identifiants incorrects
    echo "Email ou mot de passe incorrect.";
}
?>
