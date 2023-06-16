<?php

    include('../../database/database.php');

    // récuperation de la liste des annonces véhicules propres à chaque utilisateur

    $annonces = $mysql->query("select * from annoncesvehicules join utilisateurs on
    annoncesvehicules.id_utilisateur = utilisateurs.idUtilisateur where id_utilisateur = " . $_SESSION["id"]);

    // Page title
    $title = 'Festivoiturage - Véhicules';

?>