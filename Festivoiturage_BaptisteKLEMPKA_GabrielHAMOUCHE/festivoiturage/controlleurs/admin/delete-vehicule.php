<?php 

    // suppression d'une véhicule

    include('../../database/database.php');

    // suppression d'une véhicule

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if($_GET['id'] !== null){

            $idVehicule = $_GET['id'];

            $requete1 = $mysql->prepare('delete from annoncesvehicules where id = ?');
            $requete1->bind_param('i', $idVehicule);
            $requete1->execute();
            $requete1->close();
            $mysql->close();
            
            $_SESSION['message'] = 'Véhicule supprimé !';
            header("Location: ../../vues/admin/vehicules.php");

        }
    }
?>