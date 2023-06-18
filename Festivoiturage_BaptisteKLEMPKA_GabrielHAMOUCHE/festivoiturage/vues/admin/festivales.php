<?php

    // page liste des festivales admin

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) &&  $_SESSION["role"] === "ROLE_SUPER_ADMIN") {

    // articles code !!!!!!!!!!!!!!!!!!!
    // pour récupérer les festivales de la base de données
    include("../../controlleurs/admin/festivales.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>"/>
    <title><?php $title ?></title>
</head>
<body>
    <div class="goback">
        <a href="./index.php"> < Retour</a>
    </div>
    <div class="flash-message" style="text-align: center;margin: 10px auto;color: green;">

        <?php 
            if(isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>
    <div class="ajout-container">
        <!-- Lien vers la page de formulaire d'ajout d'associations -->
        <a  href="./FormulaireFestivale.php">Ajouter un festivale</a>
    </div>
    <div class="table-container">
        <table>
            <tr>
            <!-- les entêtes du tableau -->
                <th>Nom</th>
                <th>localisation</th>
                <th>photo</th>
                <th>Actions</th>
            </tr>
            <!-- boucle pour afficher toutes les associations -->
            <?php while($row = $festivales->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["localisation"] ?></td>
                    <td>
                        <img src="../../imagesFestivales/<?php echo $row["photo"] ?>" alt="Photo">
                    </td>
                    <td>
                        <a href="./DetailsFestivale.php?id=<?php echo $row["id"] ?>">Modifier</a>
                        <a href="../../controlleurs/admin/delete-festivale.php?id=<?php echo $row["id"] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
<?php
    } else {
        header("Location: ../login.php");
    }
    ?>  
