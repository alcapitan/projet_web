<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mysterium Escape</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>


<body>
    <?= include('./templates/header.php'); ?>

    <!-- MAIN SECTION (((((((((((((((((((((((((((((((((((( -->
    <section id="main" class="main">
        <video autoplay loop muted playsinline class="main-video">
            <source src="assets/images/space.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
        <div>
            <img src="assets/images/keyholeV2.png" alt="Keyhole">
            <div id="missions">
                <h2>Nos Missions Spatiales</h2>
                <div class="missions-container">
                    <div class="mission-card">
                        <i class="fas fa-rocket"></i>
                        <h3>Mission Apollo X</h3>
                        <p>Infiltrez-vous dans une station spatiale abandonnée pour découvrir ce qui est arrivé à l'équipage.</p>
                        <span>Difficulté: ⭐⭐⭐</span>
                        <br><br>
                        <a href="apollo-x.php" class="btn2">Découvrir</a>
                    </div>
                    <div class="mission-card">
                        <i class="fas fa-satellite"></i>
                        <h3>Anomalie Quantum</h3>
                        <p>Résolvez les énigmes quantiques avant que la faille temporelle ne se referme.</p>
                        <span>Difficulté: ⭐⭐⭐⭐</span>
                        <br><br>
                        <a href="quantum-anomaly.php" class="btn2">Découvrir</a>
                    </div>
                    <div class="mission-card">
                        <i class="fas fa-user-astronaut"></i>
                        <h3>Mars Colony</h3>
                        <p>Sauvez Alpha A1 la première colonie martienne d'une tempête de sable dévastatrice.</p>
                        <span>Difficulté: ⭐⭐⭐⭐⭐</span>
                        <br><br>
                        <a href="mars-colony.php" class="btn2">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="scroll-arrow">
            <i class="fas fa-angle-double-down"></i>
        </div> -->
    </section>

    <!-- SECTION STATISTIQUES  (((((((((((((()))))))))))))) -->
    <section id="stats">
        <h2>Nos Chiffres Clés</h2>
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>2000+</h3>
                <p>Aventuriers Spatials</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-door-closed"></i>
                <h3>85%</h3>
                <p>Taux d'Évasion</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-star"></i>
                <h3>4.8/5</h3>
                <p>Note Moyenne</p>
            </div>
        </div>
    </section>

    <!-- SECTION TÉMOIGNAGES ((((((((((((((())))))))))))))) -->
    <section id="testimonials">
        <h2>Ce qu'en pensent nos explorateurs</h2>
        <div class="testimonials-container">
            <div class="testimonial-card">
                <i class="fas fa-quote-left"></i>
                <p>"Une expérience unique qui nous a transportés dans l'espace !"</p>
                <p class="testimonial-author">- Sarah & Thomas</p>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-quote-left"></i>
                <p>"Les énigmes sont ingénieuses et l'ambiance est incroyable."</p>
                <p class="testimonial-author">- Marc</p>
            </div>
        </div>
    </section>

    <!-- SECTION RESERVATION ((((((((((((((())))))))))))))) -->
    <!-- <section id="booking" class="booking-section">
        <div class="booking-card">
            <h2>Réservation</h2>
            <form>
                <label>Date</label>
                <input type="date" class="form-control">
                <label>Heure</label>
                <input type="time" class="form-control">
                <label>Participants</label>
                <input type="number" class="form-control" min="1" value="1">
                <button type="submit" class="btn-primary">Reserver</button>
            </form>
        </div>
    </section> -->

    <!-- SECTION ABOUT (((((((((((((((((()))))))))))))))))) -->
    <section id="about">
        <h2>À Propos de Nous</h2>
        <p>Plongez dans une aventure immersive où chaque énigme vous rapproche de la sortie.</p>
    </section>

    <?php include('./templates/footer.php'); ?>

</body>

</html>