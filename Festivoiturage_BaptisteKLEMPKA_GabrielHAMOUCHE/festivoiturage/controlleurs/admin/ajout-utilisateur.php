<?php 

    session_start();

    //database
    include("../../database/database.php");

    // création d'un compte utilisateur

    $utilisateurs = $mysql->query("select count(*) as total from utilisateurs");
    $total = $utilisateurs->num_rows;


    if(isset($_POST['ajouter'])){
        $login = trim($_POST['login']);
        $motdepasse = trim($_POST['motdepasse']);
        $motdepasse_confirmation = trim($_POST['motdepasse_confirmation']);

        if(strlen($login) < 10 || strlen($login) > 50) {
            $_SESSION["login"] = $login;
            $_SESSION["message"] = "Login entre 10 et 50 caractères !";
            header("Location: ../../vues/admin/FormulaireUtilisateur.php");
        } else if($motdepasse !== $motdepasse_confirmation) {
            $_SESSION["login"] = $login;
            $_SESSION["message"] = "Mot de passes sont pas identiques !";
            header("Location: ../../vues/admin/FormulaireUtilisateur.php");
        } else if(strlen($motdepasse) < 10 || strlen($motdepasse_confirmation) < 10) {
            $_SESSION["login"] = $login;
            $_SESSION["message"] = "Mot de passe Minimum 10 caractères !"  ;
            header("Location: ../../vues/admin/FormulaireUtilisateur.php");
        } else {
            $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

            // admin stocker dans la bdd comme ROLE_SUPER_ADMIN
            // création du compte utilisateur => role USER par défaut 
            if($total === 0) {
                $role = "ROLE_SUPER_ADMIN";
            } else {
                $role = "ROLE_USER";
            }

            //ajout véhicule
            $sql = $mysql->prepare('insert into utilisateurs (login, motdepasse, role) values(?, ?, ?)');
            $sql->bind_param('sss', $login, $motdepasse, $role);
            $sql->execute();
            $sql->close();

            $mysql->close();

            $_SESSION['message'] = 'Compte créé !';
            header("Location: ../../index.php");
            die();
        }

        
    } else {
            $_SESSION['message'] = 'Veuillez réessayer !';
            header("Location: ../../index.php");
            die();
        }


?>