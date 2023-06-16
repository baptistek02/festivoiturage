<?php

    include('../database/database.php');

    // // liste des festivaliers (sans etre connecté)
    $festivaliers = $mysql->query("select * from festivaliers join annoncesvehicules on 
    festivaliers.id_vehicule = annoncesvehicules.id 
    order by festivaliers.id_festivalier 
    asc limit 3");

    // Page title
    $title = 'Festivoiturage - Festivaliers';

?>