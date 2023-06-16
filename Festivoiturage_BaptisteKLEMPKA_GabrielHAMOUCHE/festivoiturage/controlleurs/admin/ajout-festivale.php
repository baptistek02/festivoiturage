<?php 

    // ajout d'un festivale

    session_start();

    include("../../database/database.php");

    if(isset($_POST['ajouter'])){
        $nom = trim($_POST['nom']);
        $localisation = trim($_POST['localisation']);

        //upload infos
        $upload_dir = '../../imagesFestivales/';
        $random_number = "img-" . microtime(false);
        $file = $upload_dir . "$random_number-" . basename($_FILES['photo']['name']);
        $image_extension = file_extension($_FILES['photo']['name']);
        $image_name = "$random_number-" . $_FILES['photo']['name'];


        if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)) { 

            //ajout festivale
            $sql = $mysql->prepare('insert into festivals (nom, localisation, photo) values(?, ?, ?)');
            $sql->bind_param('sss', $nom, $localisation, $image_name);
            $sql->execute();
            $sql->close();
            $id = $mysql->insert_id;

            // ajout dates festivales
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $date3 = $_POST['date3'];

            $date1 = new DateTime($date1);
            $date2 = new DateTime($date2);
            $date3 = new DateTime($date3);

            $date1 = $date1->format('Y-m-d');
            $date2 = $date2->format('Y-m-d');
            $date3 = $date3->format('Y-m-d');
            
            if($date1 != null) {
                $sql1 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
                $sql1->bind_param('si', $date1, $id);
            }

            if($date2 != null) {
                $sql2 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
                $sql2->bind_param('si', $date2, $id);
            }

            if($date3 != null) {
                $sql3 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
                $sql3->bind_param('si', $date3, $id);
            }

            $sql1->execute();
            $sql2->execute();
            $sql3->execute();

            $sql1->close();
            $sql2->close();
            $sql3->close();

            $mysql->close();

            $_SESSION['message'] = 'Festivale ajouté !';
            header("Location: ../../vues/admin/festivales.php");
            die();
        } else {
            $_SESSION['message'] = 'Veuillez réessayer !';
            header("Location: ../../vues/admin/festivales.php");
            die();
        }
    } else {
        
    }

    function file_extension($file_name){
        return strtolower(substr($file_name, strripos($file_name, '.')));
    }
?>