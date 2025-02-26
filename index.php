<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mysterium Escape</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Gestion des couleurs */
        :root {
            --primary: rgb(47, 47, 47);
            --secondary: rgb(251, 186, 139);
            --accent: rgb(40, 40, 40);
            --bg-dark: #222;
            --text-light: #fff;
            --text-dark: #333;
        }

        /* simplification des box */
        * {
            box-sizing: border-box;
        }


        body {
            font-family: 'Poppins', sans-serif;
            background: var(--primary);
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            /* effet blur */
            /* backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.3); */
            /* -------- */
            background: var(--primary);
            box-shadow: 0 20px 50px var(--secondary);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .navbar .nav-left {
            display: flex;
            align-items: center;
        }

        /* Nom escape game haut gauche */
        .navbar .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--secondary);
            margin-right: 1.5rem;
            display: flex;
            align-items: center;
            /* Centre verticalement */
        }

        .navbar .menu {
            display: flex;
            gap: 1.5rem;
        }

        .navbar .menu a {
            color: var(--text-light);
            text-decoration: none;
        }

        .navbar .login-btn {
            background: var(--secondary);
            color: var(--text-light);
            padding: 0.5rem 1rem;
            /* padding autour du texte */
            border-radius: 20px;
            /* arrondir les bords */
            text-decoration: none;
            /* enlver barre en dessous  */
            font-weight: 600;
            margin-right: 1rem;
            white-space: nowrap;
        }


        .phone-info {
            color: var(--text-light);
            text-decoration: none;
            margin-right: 1rem;
            background: var(--primary);
            padding: 0.5rem 1rem;
            /* padding autour du texte */
            border-radius: 20px;
            /* arrondir les bords */
            font-weight: 600;

            border: 2px solid var(--secondary);
            /* Ajout du contour */
        }

        .navbar .menu-toggle {
            display: none;
            cursor: pointer;
            color: var(--text-light);
            font-size: 1.5rem;
        }


        /* Hero Section */
        .hero {
            position: relative;
            height: 90vh;
            background: url('assets/images/illustration_accueil.webp') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--text-light);
            padding: 20px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            /* Filtre sombre uniforme */

            /* Filtre complexe avec effet aura */
            /* background: linear-gradient(to top, rgba(251, 186, 139, 1) 1%, rgba(251, 186, 139, 0) 10%), 
            rgba(0, 0, 0, 0.4); */

            z-index: 1;
        }

        .hero>div {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
        }

        .hero p {
            font-size: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 20px 30px;
            background: var(--primary);
            color: var(--text-light);
            border-radius: 25px;
            text-decoration: none;

        }



        /* Booking Section */
        .booking-section {
            position: relative;
            z-index: 2;
            margin-top: -250px;
            padding: 4rem 0;
            text-align: center;
        }

        .booking-card {
            background: #fff;
            padding: 2rem;
            margin: auto;
            width: 50%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background: var(--secondary);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 50px;
            width: 100%;
            cursor: pointer;
            /* transition: background 0.3s; */
        }

        /* About Section */
        #about {
            padding: 4rem;
            text-align: center;
            background: #fff;
        }

        #about p {
            max-width: 600px;
            margin: auto;
        }

        /* Footer */
        footer {
            background: #111;
            color: #888;
            padding: 1.5rem;
            text-align: center;
        }


        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-wrap: wrap;
                padding: 1rem;
            }

            .navbar .menu {
                flex-direction: column;
                width: 100%;
                display: none;
            }

            .navbar .menu.active {
                display: flex;
            }

            .navbar .menu a {
                padding: 10px;
            }

            .navbar .menu-toggle {
                display: block;
            }

            .booking-card {
                width: 90%;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <nav class="navbar">
        <div class="nav-left">
            <!-- Modification: ajoutez l'image logo avant le nom -->
            <div class="logo">
                <img src="keyholeV2.png" style="height:50px; margin-right:10px;">
                Mysterium Escape
            </div>
            <div class="menu">
                <a href="#hero">Accueil</a>
                <a href="#about">À Propos</a>
                <a href="#booking">Réserver</a>
            </div>
        </div>
        <div class="nav-right">

            <a href="tel:0123456789" class="phone-info">
                <i class="fas fa-phone"></i> 01 23 45 67 89
            </a>
            <a href="testing2.php" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> Connexion
            </a>
            <a href="testing3.php" class="login-btn">
                <i class="fas fa-user-plus"></i> Inscription
            </a>

            <!-- Quand le menu est sur téléphone -->
            <div class="menu-toggle"><i class="fas fa-bars"></i></div>
        </div>
    </nav>
    <!-- ------------------------------------ -->
    <!-- HERO -->
    <header id="hero" class="hero">
        <div>
            <img src="keyholeV2.png" style="height:300px; filter: drop-shadow(0 0 40px rgb(251, 186, 139));">


            <h1>Vivez des sensations fortes !</h1>
            <p>Réservez votre escape game dès maintenant.</p>
            <a href="#booking" class="btn">Découvrir</a>
        </div>

    </header>
    <div style="height: 5px; background: var(--secondary); position: relative; z-index: 1;"></div>

    <section id="booking" class="booking-section">
        <div class="booking-card">
            <h2>Réservez maintenant !</h2>
            <form>
                <label>Date</label>
                <input type="date" class="form-control">
                <label>Heure</label>
                <input type="time" class="form-control">
                <label>Participants</label>
                <input type="number" class="form-control" min="1" value="1">
                <button type="submit" class="btn-primary">Valider la Réservation</button>
            </form>
        </div>
    </section>
    <section id="about">
        <h2>À Propos de Nous</h2>
        <p>Plongez dans une aventure immersive où chaque énigme vous rapproche de la sortie.</p>
    </section>
    <!-- Barre de séparation zones -->
    <div style="height: 5px; background: var(--secondary);"></div>
    <footer>
        <p>&copy; 2025 Escape Game. Tous droits réservés.</p>
    </footer>
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.menu').classList.toggle('active');
        });
    </script>
</body>

</html>