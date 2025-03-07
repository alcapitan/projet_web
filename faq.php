<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mysterium Escape - Faq</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/faq.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <?php include('./templates/header.php'); ?>

    <video autoplay loop muted playsinline class="main-video">
        <source src="assets/images/space.mp4" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
    </video>

    <section class="faq-section">
        <h1 class="faq-title">Questions Fréquemment Posées</h1>

        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    Combien de personnes peuvent participer à une mission spatiale ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Nos missions sont conçues pour des équipes de 2 à 6 astronautes. L'équipe idéale est généralement composée de 4 personnes.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Quelle est la durée d'une mission ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Chaque mission dure environ 60 minutes. Nous vous demandons d'arriver 15 minutes avant le début pour le briefing.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Les missions sont-elles adaptées aux enfants ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Les enfants à partir de 12 ans peuvent participer accompagnés d'un adulte. Certaines missions sont plus adaptées aux familles que d'autres.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Comment effectuer une réservation ?
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Vous pouvez réserver directement en ligne sur notre site ou par téléphone. Le paiement s'effectue au moment de la réservation.
                </div>
            </div>
        </div>
    </section>

    <?php include('./templates/footer.php'); ?>

    <script src="assets/js/faq.js"></script>
</body>

</html>