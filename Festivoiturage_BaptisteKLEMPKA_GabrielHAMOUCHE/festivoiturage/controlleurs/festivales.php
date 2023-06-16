<?php

    include('../database/database.php');

    // liste des festivales (sans etre connecté)
    $festivales = $mysql->query("select * from festivals");

    // Page title
    $title = 'Festivoiturage - Festivales';

?>