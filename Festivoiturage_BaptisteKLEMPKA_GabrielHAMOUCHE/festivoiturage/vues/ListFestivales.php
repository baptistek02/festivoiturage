<?php


    // page des festivales sans etre connecté
    include("../controlleurs/festivales.php");

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
    <div class="festivale-title">
        <h1>Liste des festivales</h1>
    </div>
<div class="festivales">
        <div class="container">
            <div class="inner">
                <div class="festivale-content">
                    <?php while($festivale = $festivales->fetch_array()) { ?>
                        <div class="festivale">
                            <div class="photo">
                                <img src="../imagesFestivales/<?php echo $festivale["photo"] ?>" alt="Image festivale">
                            </div>
                            <div class="infos">
                                <div class="nom-fest">
                                    <p>Nom officiel :
                                        <span class="bold frame">
                                            <?php 
                                                echo $festivale["nom"]
                                            ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="localisation"> 
                                    <h4>
                                        Localisation : <span class="bold"><?php echo $festivale["localisation"] ?></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>