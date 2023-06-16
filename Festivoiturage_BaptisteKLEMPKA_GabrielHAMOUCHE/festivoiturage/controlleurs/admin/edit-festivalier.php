<?php 

    session_start();

    //database 
    include('../../database/database.php');

    // modification d'un festivalier

    if(isset($_POST['id_festivalier'])) {
        //data from the form
        $idFestivalier = $_POST['id_festivalier'];
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $datePresence = $_POST['datePresence'];
        $login = $_POST['login'];
        $vehicule = $_POST["vehicule"];

        $datePresence = new DateTime($datePresence);
        $datePresence = $datePresence->format('Y-m-d');

        //enregistrement des données
        $sql = $mysql->prepare('update festivaliers set nom = ?, prenom = ?, datePresence = ?, login = ?, id_vehicule = ? where id_festivalier = ?');
        $sql->bind_param('ssssii', $nom, $prenom, $datePresence, $login, $vehicule, $idFestivalier);
        $sql->execute();
        $sql->close();
        

        $mysql->close();

        $_SESSION['message'] = 'Festivalier modifié !';
        header("Location: ../../vues/admin/festivaliers.php");
        die();
    }   
    
?>