<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/index.css">

    <title>Mysterium Escape - Admin</title>
</head>

<body>

    <video autoplay loop muted playsinline class="main-video">
        <source src="../assets/images/space.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../assets/images/keyholeV2.png" style="height:50px; margin-left:20px; margin-right:20px;">
            <span class="text" href="test.php">MYSTERIUM</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-door-open'></i>
                    <span class="text">Salles</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-calendar'></i>
                    <span class="text">Réservations</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Messages</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Équipes</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu bottom">
            <li>
                <a href="#">
                    <i class='bx bxs-cog bx-sm bx-spin-hover'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="index.php" class="logout">
                    <i class='bx bx-power-off bx-sm bx-burst-hover'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu bx-sm'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <!-- Notification Bell -->
            <a href="#" class="notification" id="notificationIcon">
                <i class='bx bxs-bell bx-tada-hover'></i>
                <span class="num">8</span>
            </a>
            <div class="notification-menu" id="notificationMenu">
                <ul>
                    <li>New message from John</li>
                    <li>Your order has been shipped</li>
                    <li>New comment on your post</li>
                    <li>Update available for your app</li>
                    <li>Reminder: Meeting at 3PM</li>
                </ul>
            </div>

            <!-- Profile Menu -->
            <a href="#" class="profile" id="profileIcon">
                <img src="https://placehold.co/600x400/png" alt="Profile">
            </a>
            <div class="profile-menu" id="profileMenu">
                <ul>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Panneau de contrôle administrateur</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Tableau de bord</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Vue d'ensemble</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download bx-fade-down-hover'></i>
                    <span class="text">Résultats du jour</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-door-open'></i>
                    <span class="text">
                        <h3>4</h3>
                        <p>Salles Actives</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>28</h3>
                        <p>Réservations du jour</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-trophy'></i>
                    <span class="text">
                        <h3>82%</h3>
                        <p>Taux de réussite</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Réservations Récentes</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Équipe</th>
                                <th>Salle</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Team Phoenix</p>
                                </td>
                                <td>Mars Colony</td>
                                <td><span class="status completed">Réussi</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Les Explorateurs</p>
                                </td>
                                <td>Mars Colony</td>
                                <td><span class="status process">En cours</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Ryan Doe</p>
                                </td>
                                <td>Anomalie Quantum</td>
                                <td><span class="status pending">Echec</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Tarry White</p>
                                </td>
                                <td>Mission Apollo X</td>
                                <td><span class="status process">En cours</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Selma</p>
                                </td>
                                <td>Anomalie Quantum</td>
                                <td><span class="status pending">Echec</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://placehold.co/600x400/png">
                                    <p>Andreas Doe</p>
                                </td>
                                <td>Mars Colony</td>
                                <td><span class="status completed">Réussi</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Tâches à faire</h3>
                        <i class='bx bx-plus icon'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Réinitialiser Temple Maudit</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Brief équipe 14h</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Maintenance énigme 3</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Vérifier équipements</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Mise à jour indices</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Manage Delivery Team</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Contact Selma: Confirm Delivery</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Update Shop Catalogue</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Count Profit Analytics</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </section>

    <script src="assets/js/index.js"></script>
</body>

</html>