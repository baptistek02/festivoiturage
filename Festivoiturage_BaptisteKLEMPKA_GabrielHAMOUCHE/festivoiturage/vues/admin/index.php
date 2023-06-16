<?php 

    // page accueil partie admin

    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["login"]) && isset($_SESSION["role"]) && $_SESSION["role"] === "ROLE_SUPER_ADMIN") {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>"/>
    <title>Admin - Dashboard</title>
</head>
<body>
    <!-- Navigation Admin Begin -->
    <nav class="nav-bar">
            <div class="container">
                <div class="sub-container">
                    <div class="Logo">
                        <h1>Festivoiturage</h1>
                    </div>
                    <div class="menu-container">
                        <ul class="menu">
                            <li class="item item1"><a href="./festivales.php">Festivales</a></li>
                            <li class="item item1"><a href="./festivaliers.php">Festivaliers</a></li>
                            <li class="item item1"><a href="./vehicules.php">Annonces</a></li>
                            <li class="item item1"><a href="./utilisateurs.php">Utilisateurs</a></li>
                        </ul>
                    </div>
                    <div class="getInTouch">
                        <a href="../../controlleurs/deconnexion.php" class="getInTouch-btn">Se Déconnecter</a>
                    </div>
                </div>
            </div>
        </nav>
    <!-- Navigation Admin End -->

    <div>
        <h1 
            class="admin-main-title"
            style="    font-size: 40px;color: var(--Khaki);text-align: center;margin-top: 140px;letter-spacing:1px">
            Bonjour dans votre panneau de controle
        </h1>
    </div>
</body>
</html>

<?php } else {
    header("Location: ../login.php");
}?> 