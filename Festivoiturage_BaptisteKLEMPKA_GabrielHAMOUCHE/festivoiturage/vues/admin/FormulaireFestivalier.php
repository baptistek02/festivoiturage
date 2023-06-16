<?php 

    // formulaire ajout d'un festivalier

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && 
    ($_SESSION["role"] === "ROLE_USER" || $_SESSION["role"] === "ROLE_SUPER_ADMIN")) {



    include('../../database/database.php');

    // vehicules
    $vehicules = $mysql->query("select * from annoncesvehicules");

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
        <title>Ajouter festivalier</title>
    </head>
    <body>
        <div class="goback">
            <a href="./vehicules.php"> < Retour</a>
        </div>
        <div class="form-title">
            <h1>Ajouter un festivalier</h1>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/ajout-festivalier.php" method="POST">
            <label for="">Nom</label>
            <input type="text" name="nom" maxlength="50" required>
            <label for="">Prénom</label>
            <input type="text" name="prenom" maxlength="50" required>
            <label for="">Login</label>
            <input type="text" name="login" maxlength="50" required>
            <label for="">Mot de passe</label>
            <input type="password" name="motdepasse" maxlength="15" required>
            <label for="">Date présence</label>
            <input type="date" name="datePresence" required>
            <select name="vehicule" required>
                <?php while($vehicule = $vehicules->fetch_array()) { ?>
                    <option value="<?php echo $vehicule["id"] ?>"><?php echo $vehicule["type"] ?></option>
                <?php } ?>
            </select>

            <input type="submit" value="Ajouter" name="ajouter">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  