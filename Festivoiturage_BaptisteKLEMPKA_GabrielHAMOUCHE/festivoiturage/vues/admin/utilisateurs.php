<?php

    // page liste utilisateur admin

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) &&  $_SESSION["role"] === "ROLE_SUPER_ADMIN") {

    // pour récupérer les vehicules de la base de données
    include("../../controlleurs/admin/utilisateurs.php");

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
    <div class="table-container">
        <table>
            <tr>
            <!-- les entêtes du tableau -->
                <th>login</th>
                <th>Nombre des annonces</th>
                <th>Actions</th>
            </tr>
            <!-- boucle pour afficher toutes les véhicules -->
            <?php while($row = $utilisateurs->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row["login"] ?></td>
                    <td><?php echo $row["nombreAnnonces"] ?></td>
                    <td>
                        <a href="./DetailsUtilisateur.php?id=<?php echo $row["idUtilisateur"] ?>">Modifier</a>
                        <a href="../../controlleurs/admin/delete-utilisateur.php?id=<?php echo $row["idUtilisateur"] ?>">Supprimer</a>
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