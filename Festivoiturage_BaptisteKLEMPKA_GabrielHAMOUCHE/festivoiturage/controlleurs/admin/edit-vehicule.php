<?php 

    session_start();

    //database 
    include('../../database/database.php');

    // modification d'une annonce véhicule

    if(isset($_POST['id'])) {
        //data from the form
        $idVehicule = $_POST['id'];
        $type = trim($_POST['type']);
        $placeDisponibles = trim($_POST['placeDisponibles']);
        $dateAller = $_POST['dateAller'];
        $dateRetour = $_POST['dateRetour'];

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

        //enregistrement des données
        $sql = $mysql->prepare('update annoncesvehicules set type = ?, placeDisponibles = ?, dateAller = ?, dateRetour = ? where id = ?');
        $sql->bind_param('sissi', $type, $placeDisponibles, $dateAller, $dateRetour, $idVehicule);
        $sql->execute();
        $sql->close();
        

        $mysql->close();

        $_SESSION['message'] = 'Véhicule modifié !';
        header("Location: ../../vues/admin/vehicules.php");
        die();
    }   
    
?>