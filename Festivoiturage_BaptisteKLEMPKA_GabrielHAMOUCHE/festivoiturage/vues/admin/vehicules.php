<?php

    // page liste des annonces véhicules admin

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) &&  $_SESSION["role"] === "ROLE_SUPER_ADMIN") {

    // pour récupérer les vehicules de la base de données
    include("../../controlleurs/admin/vehicules.php");

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
        <a href="./FormulaireVehicule.php">Ajouter une véhicule</a>
    </div>
    <div class="table-container">
        <table>
            <tr>
            <!-- les entêtes du tableau -->
                <th>type</th>
                <th>places disponibles</th>
                <th>date aller</th>
                <th>date retour (optionnel)</th>
                <th>Annonceur</th>
                <th>Actions</th>
            </tr>
            <!-- boucle pour afficher toutes les véhicules -->
            <?php while($row = $vehicules->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row["type"] ?></td>
                    <td><?php echo $row["placeDisponibles"] ?></td>
                    <?php

                        // format de date de yyyy-mm-dd vers dd-mm-yyyy
                        $dateAller = join("-", array_reverse(explode("-", $row["dateAller"])));
                        $dateRetour = join("-", array_reverse(explode("-", $row["dateRetour"])));

                    ?>
                    <td><?php echo $dateAller ?></td>
                    <td><?php echo $dateRetour === "" ? "----------" : $dateRetour ?></td>
                    <td><?php echo $row["login"] ?></td>
                    <td>
                        <a href="./DetailsVehicule.php?id=<?php echo $row["id"] ?>">Modifier</a>
                        <a href="../../controlleurs/admin/delete-vehicule.php?id=<?php echo $row["id"] ?>">Supprimer</a>
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