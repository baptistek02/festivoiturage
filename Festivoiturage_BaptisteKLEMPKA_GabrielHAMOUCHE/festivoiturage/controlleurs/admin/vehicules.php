<?php

    include('../../database/database.php');

    // récuperation de la liste des annonces véhicules
    
    $vehicules = $mysql->query("select * from annoncesvehicules join utilisateurs on annoncesvehicules.id_utilisateur = utilisateurs.idUtilisateur");

    // Page title
    $title = 'Festivoiturage - Véhicules';

?>