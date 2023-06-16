<?php 

    // formulaire création d'un compte utilisateur

    session_start();

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Main CSS File -->
        <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>"/>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;300;400;500;600;700;800;900&display=swap" 
            rel="stylesheet"
        /> 
        <title>Créer votre compte</title
    </head>
    <body>
        <div class="goback">
            <a href="../../index.php"> < Retour</a>
        </div>
        <div class="ajout-container">
            <?php if(isset($_SESSION["message"])) { ?>
                <p style="text-align:center; color:red;margin: 20px auto;">
                    <?php 
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                } ?>
                </p>
        </div>
        <div class="login-form">
            <form action="../../controlleurs/admin/ajout-utilisateur.php" method="POST" autocomplete="off">
                <label for="">Login</label>
                <input type="text" name="login" value="<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : '' ?>" maxlength="50" required>
                <?php unset($_SESSION["login"]) ?>
                <label for="">Mot de passe</label>
                <input type="password" name="motdepasse" maxlength="50" required>
                <label for="">Confirmer le mot de passe</label>
                <input type="password" name="motdepasse_confirmation" maxlength="50" required>
                <input type="submit" value="Ajouter" name="ajouter">
            </form> 
        </div>       
    </body>
    </html>