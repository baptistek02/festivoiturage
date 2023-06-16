<?php 

    session_start();

    include("../database/database.php");

    // traitement de connnexion à un compte utilisateur

    if(isset($_POST["connexion"])) {

        $login = $_POST["login"];
        $motdepasse = $_POST["motdepasse"];

        
        $sql = $mysql->prepare('select * from utilisateurs where login = ?');
        $sql->bind_param('s', $login);
        $sql->execute();
        $row = $sql->get_result();
        $utilisateur = $row->fetch_assoc();
    
        
        if(mysqli_num_rows($row) > 0){

            if(password_verify($motdepasse, $utilisateur["motdepasse"] )) {
                // login
                $_SESSION['id'] = $utilisateur['idUtilisateur'];
                $_SESSION['login'] = $utilisateur['login'];
                $_SESSION['role'] = $utilisateur['role'];

                // redirigier vars la partie super admin
                if($utilisateur["role"] === "ROLE_SUPER_ADMIN") {
                    header('Location: ../vues/admin/index.php');
                } else {
                    // redirigier vers la partie client
                    header('Location: ../vues/client/index.php');
                }

            } else {
                // password incorrect
                $_SESSION['prev_email'] = $login;
                $_SESSION['error'] = 'Login ou mot de passe incorrecte !';
                header('Location: ../vues/login.php');
            }
        } else {
            // email incorrect
            $_SESSION['prev_email'] = $login;
            $_SESSION['error'] = 'Login ou mot de passe incorrecte !';
            header('Location: ../vues/login.php');
        } 

    }

?>