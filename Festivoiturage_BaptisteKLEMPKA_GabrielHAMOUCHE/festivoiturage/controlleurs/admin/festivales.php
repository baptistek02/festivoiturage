<?php

    include('../../database/database.php');

    // récupération de la liste des festivales

    $festivales = $mysql->query("select * from festivals");


    // Page title
    $title = 'Festivoiturage - Festivales';

?>