<?php


    // page détails festivalier

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && 
    ($_SESSION["role"] === "ROLE_USER" || $_SESSION["role"] === "ROLE_SUPER_ADMIN")) {

    include('../../database/database.php');

    // festivale détails    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $idFestivalier = $_GET['id'];
            $sql = $mysql->prepare('select * from festivaliers where id_festivalier = ?');
            $sql->bind_param("i", $idFestivalier);
            $sql->execute();
            $row = $sql->get_result();
            $festivalier = $row->fetch_assoc();

            $vehicules = $mysql->query("select * from annoncesvehicules");
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
        <title>Détails festivalier</title>
    </head>
    <body>
        <div class="goback">
            <a href="./festivaliers.php"> < Retour</a>
        </div>
        <form class="admin-form" action="../../controlleurs/admin/edit-festivalier.php" method="POST">
            <label for="">Nom</label>
            <input type="text" name="nom" value="<?php echo $festivalier["nom"]  ?>" maxlength="50">
            <label for="">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $festivalier["prenom"] ?>" maxlength="50">
            <label for="">Login</label>
            <input type="text" name="login" value="<?php echo $festivalier["login"] ?>" maxlength="50">
            <label for="">Nouvelle date présence</label>
            <input type="date" name="datePresence" required>
            <div>Date présence ancienne
                <?php  
                    $datePresence =  join("-", array_reverse(explode("-", $festivalier["datePresence"])));
                    ?>
                    <p style="padding-left: 20px;">Aller: <?php echo $datePresence; ?></p>
            </div>
            <select name="vehicule" style="margin-top:20px;">
                <?php while($vehicule = $vehicules->fetch_array()) { 
                    if($vehicule["id"] == $festivalier["id_vehicule"]) {    
                ?>
                    <option value="<?php echo $vehicule["id"] ?>" selected><?php echo $vehicule["type"] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $vehicule["id"] ?>"><?php echo $vehicule["type"] ?></option>
                <?php }} ?>
            </select>
            <input type="hidden" value="<?php echo $festivalier["id_festivalier"] ?>" name="id_festivalier">
            <input type="submit" value="Modifier" name="modifier">
        </form>        
    </body>
    </html>
    <?php
    } else {
        header("Location: ../login.php");
    }
    ?>  