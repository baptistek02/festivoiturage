<?php

    include("../database/database.php");

    $datePresence = "";
    $dateAller = "";
    $dateRetour = "";

    if(isset($_POST["rechercher"])) {
            
        // données du formulaire de recherche
        $datePresence = $_POST["datePresence"];
        $dateAller = $_POST["dateAller"];
        $dateRetour = $_POST["dateRetour"];

        $datePresence = join("-", array_reverse(explode("-", $datePresence)));
        $dateAller = join("-", array_reverse(explode("-", $dateAller)));
        $dateRetour = join("-", array_reverse(explode("-", $dateRetour)));

    } 

    $festivaliers = $mysql->query('select * from festivaliers join annoncesvehicules on 
    festivaliers.id_vehicule = annoncesvehicules.id 
    where festivaliers.datePresence = "' . $datePresence . '" or annoncesvehicules.dateAller = "' . $dateAller . 
    '" or annoncesvehicules.dateRetour = "' . $dateRetour . '"');

    

    header("Location: ../vues/festivaliers-resultat-recherche.php");

    $title = "Festivoiturage - résultas recherche festivaliers";

?>
