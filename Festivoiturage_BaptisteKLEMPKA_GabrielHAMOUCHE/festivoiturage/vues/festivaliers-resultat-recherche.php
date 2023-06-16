<?php

    // page du résultat de recherche des festivaliers
    include("../controlleurs/festivaliers-recherche.php");

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
        <a href="../festivaliers.php">< Retour</a>
    </div>
    <div class="festivalier-title">
        <h1>Liste des festivaliers</h1>
    </div>

    <div class="recherche" style="text-align:center;color:#fff;">
        <form action="../controlleurs/festivaliers-recherche.php" method="POST">
            <label for="">Date aller</label>
            <input type="date" name="dateAller">
            <label for="">Date Retour</label>
            <input type="date" name="dateRetour">
            <label for="">Date présence</label>
            <input type="date" name="datePresence">
            <input type="submit" value="Rechercher" name="rechercher">
        </form>
    </div>

<div class="festivaliers">
    <div class="container">
        <div class="inner">
            <?php if(mysqli_num_rows($festivaliers) > 0)  { ?>
                <div class="festivalier-content">
                    <?php while($festivalier = $festivaliers->fetch_array()) { ?>
                        <div class="festivalier">
                            <div class="nom">
                                <h2>Nom complet : 
                                    <span class="fest-frame">
                                        <?php 
                                            echo $festivalier["nom"] . " " . $festivalier["prenom"]
                                        ?>
                                    </span>
                                </h2>
                            </div>
                            <div class="infos">
                                <p> Date de présence :
                                    <span class="fest-frame">
                                        <?php 
                                            $datePresence = join("-", array_reverse(explode("-", $festivalier["datePresence"])));
                                            echo $datePresence;
                                        ?>
                                    </span>
                                </p>
                                <p>Véhicule utilisée : <span class="fest-frame"><?php echo $festivalier["type"] ?></span></p>
                                <p>Places disponibles : <span class="fest-frame"><?php echo $festivalier["placeDisponibles"] ?> place(s)</span></p>
                                <?php
                                    $dateAller = join("-", array_reverse(explode("-", $festivalier["dateAller"])));
                                    $dateRetour = join("-", array_reverse(explode("-", $festivalier["dateRetour"])));
                                ?>
                                <h4>
                                    Date aller : <span class="fest-frame"><?php echo $dateAller ?></span>
                                </h4>
                                <h4>
                                    Date Retour : <span class="fest-frame"><?php echo $dateAller ?></span>
                                </h4>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
    <script src="../javascript/jquery.js?v=<?php echo time(); ?>"></script>
    <script src="../javascript/script.js?v=<?php echo time(); ?>" type="text/javascript"></script>
</body>
</html>