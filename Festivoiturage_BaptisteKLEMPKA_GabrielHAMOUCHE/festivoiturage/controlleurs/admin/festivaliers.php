<?php

    include('../../database/database.php');

    // récupération de la liste des festivaliers

    $festivaliers = $mysql->query("select * from festivaliers f join annoncesvehicules av on f.id_vehicule = av.id");


    // Page title
    $title = 'Festivoiturage - Festivaliers';

?>