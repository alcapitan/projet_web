<?php
require_once 'models/authentification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Appeler la méthode inscription
    $listeErreurs = Authentification::connexion($email, $password);
    if ($listeErreurs->hasNoErrors()) {
        header("Location: index.php");
        exit();
    }

    // Récupérer les erreurs pour les afficher plus loin dans le code
    $errors = $listeErreurs->getErrors();
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
    <a href="index.php"><button>Retour à l'accueil</button></a>
</body>

</html>