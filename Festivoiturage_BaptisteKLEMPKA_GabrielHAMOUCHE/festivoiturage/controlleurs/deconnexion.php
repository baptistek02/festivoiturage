<?php 

    // traitement déconnexion

    session_start();

    session_unset();

    session_destroy();

    header('Location: ../vues/login.php');

?>