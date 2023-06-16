<?php 

    session_start();

    //database
    include("../../database/database.php");

    // ajout d'une annonce véhicule (pour admin et client avec compte utilisateur)

    if(isset($_POST['ajouter'])){
        $type = trim($_POST['type']);
        $placeDisponibles = trim($_POST['placeDisponibles']);
        $dateAller = trim($_POST['dateAller']);
        $dateRetour = trim($_POST['dateRetour']);

        $dateAller = new DateTime($dateAller);
        $dateRetour = new DateTime($dateRetour);

        $dateAller = $dateAller->format('Y-m-d');
        $dateRetour = $dateRetour->format('Y-m-d');

        // date retour optionnel
        $dateNow = new DateTime();
        $dateNow = $dateNow->format('Y-m-d');

        if($dateNow === $dateRetour) {
            $dateRetour = null;
        } 

        $idUtilisateur = $_SESSION["id"];        

        //ajout véhicule
        $sql = $mysql->prepare('insert into annoncesvehicules (type, placeDisponibles, dateAller, dateRetour, id_utilisateur) values(?, ?, ?, ?, ?)');
        $sql->bind_param('ssssi', $type, $placeDisponibles, $dateAller, $dateRetour, $idUtilisateur);
        $sql->execute();
        $sql->close();

        $mysql->close();

        $_SESSION['message'] = 'Véhicule ajouté !';
        
        if($_SESSION["role"] === "ROLE_SUPER_ADMIN") {
            header("Location: ../../vues/admin/vehicules.php");
        } else {
            header("Location: ../../vues/client/annonces.php");
        }
        die();
    } else {
            $_SESSION['message'] = 'Veuillez réessayer !';
            header("Location: ../../vues/admin/vehicules.php");
            die();
        }
?>