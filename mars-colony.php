<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mars Colony - Mysterium Escape</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <?php include('./templates/header.php'); ?>

    <section class="main">
        <video autoplay loop muted playsinline class="main-video">
            <source src="assets/images/mars-surface.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
        <div>
            <div id="missions">
                <h2>Mission: Mars Colony</h2>
                <div class="mission-card" style="max-width: 800px; margin: 0 auto;">
                    <i class="fas fa-user-astronaut"></i>
                    <h3>Sauvez la colonie Alpha A1</h3>
                    <p>La première colonie martienne fait face à une catastrophe imminente. Une tempête de sable dévastatrice approche et les systèmes de protection sont défaillants. Votre équipe a 60 minutes pour sauver les 200 colons.</p>
                    <span>Difficulté: ⭐⭐⭐⭐⭐</span>
                </div>
            </div>
        </div>
    </section>

    <section id="stats">
        <h2>Détails de la Mission</h2>
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-clock"></i>
                <h3>60min</h3>
                <p>Temps de Mission</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>2-6</h3>
                <p>Joueurs</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-trophy"></i>
                <h3>15%</h3>
                <p>Taux de Réussite</p>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <h2>Objectifs de Mission</h2>
        <div class="testimonials-container">
            <div class="testimonial-card">
                <i class="fas fa-shield-alt"></i>
                <p>Rétablir les boucliers atmosphériques</p>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-cog"></i>
                <p>Sécuriser les systèmes de survie</p>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-running"></i>
                <p>Évacuer les zones critiques</p>
            </div>
        </div>
    </section>

    <section id="about">
        <h2>Réserver cette Mission</h2>
        <p>2-3 joueurs: 35€/personne | 4-6 joueurs: 30€/personne</p>
        <br>
        <a href="reservation.php?mission=mars-colony" class="btn2">Réserver Maintenant</a>
    </section>

    <?php include('./templates/footer.php'); ?>
</body>

</html>