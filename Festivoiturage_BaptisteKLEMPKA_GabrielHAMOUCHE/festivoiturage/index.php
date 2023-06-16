
<?php

    // page d'accueil du site

    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;300;400;500;600;700;800;900&display=swap" 
          rel="stylesheet"
    /> 

    <title>Festivoiturage - Accueil</title>
</head>
<body>
    <!-- nav bar -->
    <?php
        include('vues/includes/nav-bar.php');
    ?>

    <!-- Intro text Section Begin -->
    <section class="intro-text">
        <div class="flash-message" style="text-align: center;margin: 10px auto;color: green;">
            <?php 
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
        </div>
        <div class="container">
            <div class="inner">
                <h2>
                    Avez-vous déjà essayer notre service de <span>Festivoiturage.</span>
                </h2>
                <p>
                    Festivoiturage est une plateforme de covoiturage dédiée aux festivals.
                    Elle facilite le partage de trajets en voiture entre les participants, réduisant les coûts et l'impact environnemental.
                    La plateforme met en relation conducteurs et passagers pour une expérience conviviale et économique.
                </p>
                <div class="getInTouch" style="margin: 20px auto 20px 0;">
                    <a href="vues/admin/FormulaireUtilisateur.php" class="getInTouch-btn">Créer un compte</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro text Section End -->

    <!-- About Section Begin -->
    <section class="about" data-aos="fade-up" data-aos-duration="700" id="about">
        <div class="container">
            <div class="inner">
                <div class="text text1">
                    <h3>Vivez une expérience unique<span>.</span></h3>
                    <p>
                        Vivez une expérience unique en rejoignant Festivoiturage,
                        la plateforme qui vous permet de partager des trajets lors de vos événements préférés.
                        Que vous soyez conducteur ou passager, vous vivrez des moments inoubliables en rencontrant de nouvelles personnes passionnées par la musique, la culture et la fête.
                        
                    </p>
                    <p>
                        
                    </p>
                </div>
                <div class="text text2">
                    <p>
                        Profitez d'un voyage convivial et économique, tout en contribuant à la préservation de l'environnement. 
                    </p>
                    <p>
                        Rejoignez-nous dès maintenant et créez des souvenirs mémorables tout en voyageant vers vos festivals et concerts préférés.
                    </p>
                    <p>
                        Bonne route !
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Intereseted Section Begin -->
        <section class="interested" data-aos="fade-up" data-aos-duration="700">
            <div class="container">
                <div class="inner">
                    <h2 class="title">
                    Avez-vous des idées pour nous aider à développer notre service ?
                    </h2>
                    <p class="parag">
                        Nous serons honoré de recevoir vos propositions et vos idées pour une meilleur expérience. 
                    </p>
                    <a href="#" class="getInTouch-btn">Contacter-nous</a>
                </div>
            </div>
        </section>
    <!-- Intereseted Section End -->

    <!-- footer -->
    <?php include('vues/includes/footer.php'); ?>

    <script src="javascript/jquery.js"></script>
    <script src="javascript/script.js" type="text/javascript"></script>
</body>
</html>