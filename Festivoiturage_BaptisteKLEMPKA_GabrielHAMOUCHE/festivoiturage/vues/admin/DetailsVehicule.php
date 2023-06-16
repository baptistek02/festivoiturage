<?php

    // page détails annonce véhicule

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && 
    ($_SESSION["role"] === "ROLE_USER" || $_SESSION["role"] === "ROLE_SUPER_ADMIN")) {

    include('../../database/database.php');

    // festivale détails    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $idVehicule = $_GET['id'];
            $sql = $mysql->prepare('select * from annoncesvehicules where id = ?');
            $sql->bind_param("i", $idVehicule);
            $sql->execute();
            $row = $sql->get_result();
            $vehicule = $row->fetch_assoc();
        
    }
    
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
        <title>Détails véhicule</title>
    </head>
    <body>
        <div class="goback">
            <a href="./vehicules.php"> < Retour</a>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/edit-vehicule.php" method="POST">
            <label for="">Type</label>
            <input type="text" name="type" value="<?php echo $vehicule["type"]  ?>" maxlength="50" >
            <label for="">Places disponibles</label>
            <input type="number" name="placeDisponibles" value="<?php echo $vehicule["placeDisponibles"] ?>" >
            <label for="">Date aller</label>
            <input type="date" name="dateAller" required>
            <label for="">Date Retour</label>
            <input type="date" name="dateRetour">
            <div>Anciennes dates
                <?php  
                    $dateAller =  join("-", array_reverse(explode("-", $vehicule["dateAller"])));
                    $dateRetour =  join("-", array_reverse(explode("-", $vehicule["dateRetour"])));
                    ?>
                    <p style="padding-left: 20px;">Aller: <?php echo $dateAller; ?></p>
                    <p style="padding-left: 20px;">Retour: <?php echo ($dateRetour === "" ? "-----" : $dateRetour); ?></p>
            </div>
            <input type="hidden" value="<?php echo $vehicule["id"] ?>" name="id">
            <input type="submit" value="Modifier" name="modifier">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  