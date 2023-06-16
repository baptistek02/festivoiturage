<?php

    include('../database/database.php');

    // liste des annonces (sans etre)
    $annonces = $mysql->query("select * from annoncesvehicules join utilisateurs on
    annoncesvehicules.id_utilisateur = utilisateurs.idUtilisateur order by annoncesvehicules.id asc limit 3");

    // Page title
    $title = 'Festivoiturage - Annonces';

?>