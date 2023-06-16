
<?php

    // formulaire ajout d'un festivale

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
        <title>Ajouter festivale</title>
    </head>
    <body>
        <div class="goback">
            <a href="./festivales.php"> < Retour</a>
        </div>
        <div class="form-title">
            <h1>Ajouter un festivale</h1>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/ajout-festivale.php" method="POST" enctype="multipart/form-data" >
            <label for="">Nom</label>
            <input type="text" name="nom" maxlength="50" required>
            <label for="">Localisation</label>
            <input type="text" name="localisation" required>
            <label for="">Photo</label>
            <input type="file" name="photo" required>
            <label for="">Dates de festivale</label>
            <input type="date" name="date1" required>
            <input type="date" name="date2">
            <input type="date" name="date3">
            <input type="submit" value="Ajouter" name="ajouter">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  