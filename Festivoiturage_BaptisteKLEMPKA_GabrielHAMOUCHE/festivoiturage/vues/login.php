<!-- page de connexion (formulaire de connexion) -->

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;300;400;500;600;700;800;900&display=swap" 
        rel="stylesheet"
    /> 
    <title>Festivoiturage - Login</title>
</head>
<body>
    <?php

        session_start();
    
    ?>
    <div class="goback">
        <a href="../index.php"> < Retour</a>
    </div>
    <div class="login-form">
        <div class="title">
            <h4>.Login.</h4>
        </div>
        <?php if(isset($_SESSION['success'])) { ?>
            <div class="success">
                <?php echo $_SESSION['success']; ?>
            </div>
        <?php 
                unset($_SESSION['success']);
            } 
        ?>
        <?php if(isset($_SESSION['error'])) { ?>
            <div class="Error">
                <?php echo $_SESSION['error']; ?>
            </div>
        <?php 
                unset($_SESSION['error']);
            } 
        ?>
        <form action="../controlleurs/connexion.php" method="POST" autocomplete="off">
            <?php if(isset($_SESSION['prev_email'])) { ?>
                <input type="text" name="login" value="<?php echo $_SESSION['prev_email']; ?>" placeholder="Login" required>
            <?php 
                unset($_SESSION['prev_email']);
            } else { ?>
                <input type="text" name="login" placeholder="Login" required>
            <?php } ?>
            <input type="password" name="motdepasse" placeholder="Mot de passe" required>
            <input type="submit" value="connexion" name="connexion">
        </form>
        <div class="forgot_pass">
            <!-- forgotten passowrd link -->
            <a href="#">forgot password ?</a>
        </div>
    </div>

    <!-- javascript file -->
    <script src="public/js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>