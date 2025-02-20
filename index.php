<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réservation d'escape game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root {
      --primary: #402d1f;
      --secondary: #f2be99;
      --bg-dark: #222;
      --text-light: #fff;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      margin: 0;
      scroll-behavior: smooth;
    }
    /* Navbar */
    .navbar {
      background: rgba(0,0,0,0.7);
      backdrop-filter: blur(8px);
      padding: 1rem 2rem;
    }
    .navbar-brand, .nav-link { color: var(--text-light) !important; }
    .nav-link:hover { color: var(--secondary) !important; }
    /* Hero Section with Animations */
    .hero {
      position: relative;
      height: 100vh;
      background-image: url('assets/images/illustration_accueil.webp');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      background-color: rgba(0, 0, 0, 0.3);
      background-blend-mode: darken;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      overflow: hidden;
    }
    .hero::before {
      content: "";
      position: absolute;
      width: 150%;
      height: 150%;
      top: -25%;
      left: -25%;
      background: radial-gradient(circle, rgba(255,255,255,0.2), transparent 70%);
      animation: pulse 10s infinite ease-in-out;
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 0.9; }
      50% { transform: scale(1.2); opacity: 0.5; }
    }
    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .hero-content {
      position: relative;
      z-index: 2;
      color: var(--text-light);
      padding: 0 1rem;
    }
    .hero-content h1 {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 1rem;
      animation: fadeInUp 1s ease-out;
    }
    .hero-content p {
      font-size: 1.3rem;
      margin-bottom: 2rem;
      animation: fadeInUp 1.2s ease-out;
    }
    .hero .btn {
      border-radius: 50px;
      padding: 0.8rem 2.5rem;
      font-size: 1.1rem;
      transition: transform 0.3s;
      animation: fadeInUp 1.4s ease-out;
    }
    .hero .btn:hover { transform: scale(1.05); }
    /* About Section */
    #about {
      padding: 4rem 0;
      background: #fff;
    }
    #about .section-title {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 600;
    }
    #about p {
      max-width: 800px;
      margin: auto;
      text-align: center;
      font-size: 1.1rem;
      line-height: 1.6;
    }
    /* Booking Section */
    .booking-section {
      margin-top: -80px;
      position: relative;
      z-index: 3;
      padding: 3rem 0;
    }
    .booking-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 2.5rem;
      max-width: 800px;
      margin: auto;
    }
    .booking-card h2 { margin-bottom: 1.5rem; font-weight: 600; }
    .form-control {
      border-radius: 10px;
      height: 50px;
      padding: 0.75rem 1rem;
      border: 1px solid #ddd;
      transition: border-color 0.3s;
    }
    .form-control:focus { border-color: var(--primary); box-shadow: none; }
    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
      border-radius: 50px;
      height: 50px;
      transition: opacity 0.3s;
    }
    .btn-primary:hover { opacity: 0.9; }
    /* Services Section */
    #services {
      padding: 4rem 0;
      background: #f4f4f4;
    }
    #services h2 {
      font-weight: 600;
      margin-bottom: 2rem;
      text-align: center;
    }
    .service-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
    }
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    /* Testimonials Section */
    #testimonials {
      padding: 4rem 0;
      background: #fff;
    }
    #testimonials h2 {
      font-weight: 600;
      margin-bottom: 2rem;
      text-align: center;
    }
    .testimonial-card {
      background: #f8f9fa;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      margin: 1rem;
    }
    .testimonial-card p {
      font-style: italic;
    }
    .testimonial-card h5 {
      margin-top: 1rem;
      font-weight: 600;
    }
    /* Contact Section */
    #contact {
      padding: 4rem 0;
      background: var(--bg-dark);
      color: #ccc;
    }
    #contact h2 {
      font-weight: 600;
      margin-bottom: 2rem;
      text-align: center;
      color: #fff;
    }
    #contact .form-control {
      background: #333;
      border: none;
      color: #fff;
    }
    #contact .form-control::placeholder {
      color: #aaa;
    }
    #contact .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
    }
    /* Footer */
    footer {
      background: #111;
      color: #888;
      padding: 1.5rem 0;
      text-align: center;
      font-size: 0.9rem;
    }
    footer a { color: var(--secondary); text-decoration: none; }
    footer a:hover { text-decoration: underline; }
    @media (max-width: 768px) {
      .hero-content h1 { font-size: 2.8rem; }
      .hero-content p { font-size: 1rem; }
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Escape Game</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#hero">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">À Propos</a></li>
          <li class="nav-item"><a class="nav-link" href="#booking">Réserver</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#testimonials">Témoignages</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section with Animations -->
  <header id="hero" class="hero">
    <div class="hero-content">
      <h1>Vivez des sensations fortes !</h1>
      <p>Réservez votre escape game dans une de nos nombreuses boutiques.</p>
      <a href="#booking" class="btn btn-primary btn-lg">Réserver Maintenant</a>
    </div>
  </header>

  <!-- Booking Section -->
  <section id="booking" class="booking-section">
    <div class="container">
      <div class="booking-card">
        <h2>Réservez maintenant !</h2>
        <form>
          <i>Commentaire alex : Vous devez être connectés pour réserver. + rajouter boutique et activités</i>
          <div class="row g-3 mt-3">
            <div class="col-md-4">
              <label for="date" class="form-label">Date</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="col-md-4">
              <label for="time" class="form-label">Heure</label>
              <input type="time" class="form-control" id="time">
            </div>
            <div class="col-md-4">
              <label for="guests" class="form-label">Participants</label>
              <input type="number" class="form-control" id="guests" min="1" value="1">
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary btn-lg w-100">Valider la Réservation</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about">
    <div class="container">
      <h2 class="section-title">À Propos de Nous</h2>
      <p>
        Escape Game "Aller au Travail" vous plonge dans une ambiance surprenante où la routine se transforme en défi ludique. Notre équipe passionnée a conçu un scénario immersif pour vous faire oublier le quotidien et stimuler votre esprit d'équipe. Préparez-vous à relever des énigmes et à vivre l'exception !
      </p>
    </div>
  </section>

  <i>Supprimer nos services exclusifs et témoignages et contactez-nous, et rajouter la faq, conformément à ce qui est demandé en consigne.</i>

  <!-- Services Section -->
  <section id="services">
    <div class="container">
      <h2>Nos Services Exclusifs</h2>
      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="service-card h-100">
            <h4>Scénario Immersif</h4>
            <p>Plongez dans une histoire captivante où chaque énigme vous rapproche de la sortie.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-card h-100">
            <h4>Assistance 24/7</h4>
            <p>Notre équipe est disponible à tout moment pour vous guider durant votre aventure.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-card h-100">
            <h4>Sécurité Maximale</h4>
            <p>Des mesures strictes sont en place pour garantir une expérience sûre et agréable.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials">
    <div class="container">
      <h2>Témoignages</h2>
      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"Une aventure renversante ! J'ai oublié mon stress quotidien dès l'instant où le jeu a commencé."</p>
            <h5>Jean Dupont</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"Original et surprenant, cet escape game transforme l'ordinaire en une expérience extraordinaire."</p>
            <h5>Marie Claire</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="testimonial-card">
            <p>"Une équipe professionnelle et une ambiance unique qui m'ont permis d'échapper à la routine !"</p>
            <h5>Antoine Lavoisier</h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <h2>Contactez-Nous</h2>
      <div class="row justify-content-center mt-4">
        <div class="col-md-8">
          <form>
            <div class="mb-3">
              <label for="contactName" class="form-label">Nom</label>
              <input type="text" class="form-control" id="contactName" placeholder="Votre nom">
            </div>
            <div class="mb-3">
              <label for="contactEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="contactEmail" placeholder="Votre email">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Votre message"></textarea>
            </div>
            <div>
              <button type="submit" class="btn btn-primary btn-lg w-100">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="mb-3">
        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
      <p>&copy; 2025 Escape Game "Aller au Travail". Tous droits réservés.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
