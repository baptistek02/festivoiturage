<?php 

    // suppression d'un utilisateur

    include('../../database/database.php');

    // suppression d'un compte utilisateur

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if($_GET['id'] !== null){

            $idUtilisateur = $_GET['id'];

            $requete1 = $mysql->prepare('delete from utilisateurs where idUtilisateur = ?');
            $requete1->bind_param('i', $idUtilisateur);
            $requete1->execute();
            $requete1->close();
            $mysql->close();
            
            $_SESSION['message'] = 'Utilisateur supprimé !';
            header("Location: ../../vues/admin/utilisateurs.php");

        }
    }
?>