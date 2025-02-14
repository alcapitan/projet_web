<?php
session_start();

// Connexion à la base de données PostgreSQL avec PDO
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
    $confirm_password = $_POST['confirm_password'] ?? '';
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $date_naissance = $_POST['date_naissance'] ?? '';

    // Validation des champs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est invalide.";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }
    if (empty($prenom) || empty($nom)) {
        $errors[] = "Le prénom et le nom sont obligatoires.";
    }

    // Si aucune erreur, insérer l'utilisateur
    if (empty($errors)) {
        // formatage des données
        $email = strtolower($email);
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $prenom = strtolower($prenom);
        $nom = strtolower($nom);
        
        $sql = "INSERT INTO users (email, password, prenom, nom, date_naissance) 
                VALUES (:email, :password, :prenom, :nom, :date_naissance)";
        $stmt = $pdo->prepare($sql);
        
        try {
            $stmt->execute([
                ':email' => $email,
                ':password' => $hashed_password,
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':date_naissance' => $date_naissance ?: null
            ]);
            header("Location: connexion.php");
            exit();
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="inscription.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars(isset($email) ? $email : 'a@mail.fr') ?>" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br>

        <label for="confirm_password">Confirmez le mot de passe :</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars(isset($prenom) ? $prenom : 'Alexandre') ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars(isset($nom) ? $nom : 'BOYER') ?>" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" id="date_naissance"  value="<?= htmlspecialchars(isset($date_naissance) ? $date_naissance : '2005-12-29') ?>"><br>

        <button type="submit">S'inscrire</button>
    </form>

    <a href="connexion.php">Se connecter</a>
</body>
</html>
