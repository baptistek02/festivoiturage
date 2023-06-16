<?php 

    session_start();

    //database
    include("../../database/database.php");

    // ajout d'un festivalier

    if(isset($_POST['ajouter'])){
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $datePresence = trim($_POST['datePresence']);
        $login = trim($_POST['login']);
        $motdepasse = trim($_POST['motdepasse']);
        $vehicule = $_POST['vehicule'];

        $datePresence = new DateTime($datePresence);
        $datePresence = $datePresence->format('Y-m-d');

        // cryptage mot de passe
        $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

        //ajout véhicule
        $sql = $mysql->prepare('insert into festivaliers (nom, prenom, datePresence, login, motdepasse, id_vehicule) values(?, ?, ?, ?, ?, ?)');
        $sql->bind_param('sssssi', $nom, $prenom, $datePresence, $login, $motdepasse, $vehicule);
        $sql->execute();
        $sql->close();

        $mysql->close();

        $_SESSION['message'] = 'Festivalier ajouté !';
        header("Location: ../../vues/admin/festivaliers.php");
        die();
    } else {
            $_SESSION['message'] = 'Veuillez réessayer !';
            header("Location: ../../vues/admin/festivaliers.php");
            die();
        }


?>