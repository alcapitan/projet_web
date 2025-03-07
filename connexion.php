<?php
require_once 'models/authentification.php';

$errors = [];
$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $listeErreurs = Authentification::connexion($email, $password);
    if ($listeErreurs->hasNoErrors()) {
        header("Location: index.php");
        exit();
    } else {
        $errors = $listeErreurs->getErrors();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mysterium Escape - Connexion</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <?php include('./templates/header.php'); ?>

    <video autoplay muted loop class="video-bg">
        <source src="assets/images/space.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <section class="form-container">
        <form action="connexion.php" method="POST">
            <h3>Connexion</h3>

            <?php if (!empty($errors)): ?>
                <div class="error-container">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="email" placeholder="Email" id="email" name="email" value="<?= htmlspecialchars($email ?: 'admin@monsite.fr') ?>" required>

            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Password" id="password" name="password" required>

            <button type="submit">Valider</button>

            <p>
                Pas de compte ?
                <a href="inscription.php" style="color: var(--secondary); text-decoration: underline;">Cliquez ici</a>.
            </p>
        </form>
    </section>

    <?php include('./templates/footer.php'); ?>
</body>

</html>