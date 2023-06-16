<?php

    // page des annonces sans etre connecté (AJAX)
    include("../controlleurs/annonces.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>" />
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="goback">
        <a href="../index.php">< Retour</a>
    </div>
    <div class="annonce-title">
        <h1>Liste des annonces</h1>
    </div>
<div class="annonces">
        <div class="container">
            <div class="inner">
                <div class="annonce-content">
                    <?php while($annonce = $annonces->fetch_array()) { ?>
                        <div class="annonce">
                            <div class="title">
                                <h2>Véhicule : 
                                    <!-- annonce title -->
                                    <span class="bold">
                                        <?php 
                                            echo $annonce["type"]
                                        ?>
                                    </span>
                                </h2>
                            </div>
                            <div class="infos">
                                <div class="place-dispo">
                                    <p> Places disponibles :
                                        <span class="bold frame">
                                            <?php 
                                                echo $annonce["placeDisponibles"]
                                            ?>
                                            place(s)
                                        </span>
                                    </p>
                                </div>
                                <div class="annonceur"> 
                                    <h4>
                                        Annonceur : <span class="bold"><?php echo $annonce["login"] ?></span>
                                    </h4>
                                </div>
                            </div>
                            <div class="dates"> 
                                <?php
                                    $dateAller = join("-", array_reverse(explode("-", $annonce["dateAller"])));
                                    $dateRetour = join("-", array_reverse(explode("-", $annonce["dateRetour"])));
                                ?>
                                <h4>
                                    Date aller : <?php echo $dateAller ?>
                                </h4>
                                <h4>
                                    Date Retour : <?php echo $dateRetour != null ? $dateRetour : "-----"; ?>
                                </h4>
                            </div>
                        </div>
                    <?php 
                            $idAnnonce = $annonce["id"];
                        } ?>
                </div>
                <div class="load-more-annonce">
                  
                    <button 
                    style="
                        cursor:pointer;display:block;margin: 30px auto;background-color: var(--Gold);
                        color:var(--Blacky);border-radius: 6px;text-align: center;
                        padding: 12px 40px;border: none;outline:none;"
                        class="load-more-btn">Charger plus</button>
                    <input type="hidden" value="<?php echo $idAnnonce; ?>" class="val_idAnnonce">
                </div>
            </div>
        </div>
    </div>
    <script src="../javascript/jquery.js?v=<?php echo time(); ?>"></script>
    <script src="../javascript/script.js?v=<?php echo time(); ?>" type="text/javascript"></script>
</body>
</html>