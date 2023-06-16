<?php

    // formulaire ajout annonce véhicule

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && 
    ($_SESSION["role"] === "ROLE_USER" || $_SESSION["role"] === "ROLE_SUPER_ADMIN")) {
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
        <title>Ajouter véhicule</title>
    </head>
    <body>
        <div class="goback">
            <?php if($_SESSION["role"] === "ROLE_SUPER_ADMIN") { ?>
                <a href="./vehicules.php"> < Retour</a>
            <?php } else { ?>
                <a href="../client/annonces.php"> < Retour</a>
            <?php } ?>
        </div>
        <div class="form-title">
            <h1>Ajouter une véhicule</h1>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/ajout-vehicule.php" method="POST">
            <label for="">Type</label>
            <input type="text" name="type" maxlength="50" required>
            <label for="">Places disponibles</label>
            <input type="number" name="placeDisponibles" required>
            <label for="">Date aller</label>
            <input type="date" name="dateAller" required>
            <label for="">Date Retour</label>
            <input type="date" name="dateRetour">
            <input type="submit" value="Ajouter" name="ajouter">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  