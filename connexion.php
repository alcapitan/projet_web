<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'etd';
// Charger la configuration depuis config.ini
$config = parse_ini_file('config.ini', true);
$user = $config['database']['user'];
$password = $config['database']['password'];

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validation des champs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est invalide.";
    }
    if (empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }

    // Si aucune erreur, vérifier les identifiants
    if (empty($errors)) {
        // formatage des données
        $email = strtolower($email);
        
        $sql = "SELECT * FROM users WHERE email = :email";
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
            $errors[] = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="connexion.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars(isset($email) ? $email : 'admin@monsite.fr') ?>" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value="<?= htmlspecialchars('29122005') ?>" required><br>

        <button type="submit">Se connecter</button>
    </form>

    <a href="inscription.php">S'inscrire</a>
    <button><a href="index.php">Retour à l'accueil</a></button>
    
</body>

</html>
