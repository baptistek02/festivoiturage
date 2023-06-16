<?php 

    // suppression d'un festivalier
    include('../../database/database.php');

    // suppression d'un festivalier

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if($_GET['id'] !== null){

            $idFestivalier = $_GET['id'];

            $requete1 = $mysql->prepare('delete from festivaliers where id_festivalier = ?');
            $requete1->bind_param('i', $idFestivalier);
            $requete1->execute();
            $requete1->close();
            $mysql->close();
            
            $_SESSION['message'] = 'Festivalier supprimé !';
            header("Location: ../../vues/admin/festivaliers.php");

        }
    }
?>