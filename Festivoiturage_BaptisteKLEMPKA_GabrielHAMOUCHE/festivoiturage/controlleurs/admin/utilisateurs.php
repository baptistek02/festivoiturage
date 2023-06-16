<?php

    include('../../database/database.php');

    // récuperation de la liste des utilisateurs 

    $utilisateurs = $mysql->query("select idUtilisateur, login, count(annoncesvehicules.id_utilisateur) as nombreAnnonces from 
    utilisateurs left join annoncesvehicules on utilisateurs.idUtilisateur = annoncesvehicules.id_utilisateur
    group by idUtilisateur, login, utilisateurs.idUtilisateur");

    // Page title
    $title = 'Festivoiturage - Utilisateurs';

?>