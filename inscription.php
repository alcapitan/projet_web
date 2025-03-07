<?php
require_once 'models/authentification.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';

    // Appeler la méthode inscription
    $listeErreurs = Authentification::inscription($email, $password, $prenom, $nom);
    if ($listeErreurs->hasNoErrors()) {
        header("Location: index.php");
        exit();
    }

    // Récupérer les erreurs pour les afficher dans le formulaire
    $errors = $listeErreurs->getErrors();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mysterium Escape - Inscription</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <?= include('./templates/header.php'); ?>

    <video autoplay muted loop class="video-bg">
        <source src="assets/images/space.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <section class="form-container">
        <form action="inscription.php" method="POST">
            <h3>Inscription</h3>
            <?php if (!empty($errors)): ?>
                <div style="color: red;">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form-row">
                <div class="form-column">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($email ?? 'a@mail.fr') ?>" required>
                </div>
                <div class="form-column">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" value="<?= htmlspecialchars($password ?? '29122005') ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?= htmlspecialchars($nom ?? 'BOYER') ?>" required>
                </div>
                <div class="form-column">
                    <label for="confirm_password">Confirmation du mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Password confirmation" value="<?= htmlspecialchars($confirm_password ?? '29122005') ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?= htmlspecialchars($prenom ?? 'Alexandre') ?>" required>
                </div>
            </div>
            <button type="submit">Valider</button>
            <p>Déjà un compte ? <a href="connexion.php" style="color: var(--secondary); text-decoration: underline;">Cliquez ici</a>.</p>
        </form>
    </section>
    <?php include('./templates/footer.php'); ?>
</body>

</html>