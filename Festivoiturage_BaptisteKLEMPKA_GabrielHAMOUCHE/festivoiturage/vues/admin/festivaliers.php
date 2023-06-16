<?php
    
    // page des festivaliers admin 
    
    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) &&  $_SESSION["role"] === "ROLE_SUPER_ADMIN") {


    // pour récupérer les festivales de la base de données
    include("../../controlleurs/admin/festivaliers.php");

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
        <!-- le messages de confirmation d'ajout d'une association va s'afficher ici -->
        <!-- vous pouvez changer le css du div ci-dessus selon vos préférences-->
        <?php 
            if(isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>
    <div class="ajout-container">
        <!-- Lien vers la page de formulaire d'ajout d'associations -->
        <a href="./FormulaireFestivalier.php">Ajouter un festivalier</a>
    </div>
    <div class="table-container">
        <table>
            <tr>
            <!-- les entêtes du tableau -->
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date présence</th>
                <th>Login</th>
                <th>Véhicule</th>
                <th>Actions</th>
            </tr>
            <!-- boucle pour afficher toutes les associations -->
            <?php while($row = $festivaliers->fetch_array()){ ?>
                <tr>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["prenom"] ?></td>
                    <td>
                        <?php
                            $datePresence =  join("-", array_reverse(explode("-", $row["datePresence"])));
                            echo $datePresence
                        ?>
                    </td>
                    <td><?php echo $row["login"] ?></td>
                    <td><?php echo $row["type"] ?></td>
                    <td>
                        <a href="./DetailsFestivalier.php?id=<?php echo $row["id_festivalier"] ?>">Modifier</a>
                        <a href="../../controlleurs/admin/delete-festivalier.php?id=<?php echo $row["id_festivalier"] ?>">Supprimer</a>
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