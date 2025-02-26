<?php
require_once 'models/authentification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';

    // Appeler la méthode inscription
    $listeErreurs = Authentification::inscription($email, $password, $prenom, $nom);
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
        <input type="password" name="password" id="password" value="<?= htmlspecialchars('29122005') ?>" required><br>

        <label for="confirm_password">Confirmez le mot de passe :</label>
        <input type="password" name="confirm_password" id="confirm_password" value="<?= htmlspecialchars('29122005') ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars(isset($prenom) ? $prenom : 'Alexandre') ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars(isset($nom) ? $nom : 'BOYER') ?>" required><br>

        <button type="submit">S'inscrire</button>
    </form>

    <a href="connexion.php">Se connecter</a>
    <a href="index.php"><button>Retour à l'accueil</button></a>
</body>

</html>