<?php

    // page détails festivale

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && 
    ($_SESSION["role"] === "ROLE_USER" || $_SESSION["role"] === "ROLE_SUPER_ADMIN")) {


    include('../../database/database.php');

    // festivale détails    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $idFestivale = $_GET['id'];
            $sql = $mysql->prepare('select * from festivals where id = ?');
            $sql->bind_param("i", $idFestivale);
            $sql->execute();
            $row = $sql->get_result();
            $festivale = $row->fetch_assoc();

            $sql2 = $mysql->query("select * from datesfestivales where id_festivale = " . $idFestivale);

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
        <title>Détails festivale</title>
    </head>
    <body>
        <div class="goback">
            <a href="./festivales.php"> < Retour</a>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/edit-festivale.php" method="POST" enctype="multipart/form-data">
            <label for="">Nom</label>
            <input type="text" value="<?php echo $festivale["nom"] ?>" name="nom" maxlength="50">
            <label for="">Localisation</label>
            <input type="text" value="<?php echo $festivale["localisation"] ?>" name="localisation">
            <label for="">Photo</label>
            <input type="file" name="photo">
            <label for="">Saisir de nouvelles dates</label>
            <input type="date" name="date1" required>
            <input type="date" name="date2" required>
            <input type="date" name="date3" required>
            <div>Anciennes dates
                <?php while($row = $sql2->fetch_array()) { 
                    $date =  join("-", array_reverse(explode("-", $row["date"])));
                    ?>
                    <p><?php echo $date; ?></p>
                <?php } ?>
            </div>
            <input type="hidden" name="id" value="<?php echo $festivale['id']; ?>">
            <input type="submit" value="modifier" name="Modifier">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  