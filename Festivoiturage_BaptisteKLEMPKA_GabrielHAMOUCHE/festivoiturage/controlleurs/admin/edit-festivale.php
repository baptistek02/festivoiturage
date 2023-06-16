<?php 

    session_start();

    //database 
    include('../../database/database.php');

    // modification d'un festivale

    if(isset($_POST['id'])) {
        //data from the form
        $idFestivale = $_POST['id'];
        $nom = trim($_POST['nom']);
        $localisation = trim($_POST['localisation']);
        //upload infos
        $upload_dir = '../../imagesFestivales/';
        $random_number = "img-" . microtime(false);
        $file = $upload_dir . "$random_number-" . basename($_FILES['photo']['name']);
        $image_extension = file_extension($_FILES['photo']['name']);
        $image_name = "$random_number-" . $_FILES['photo']['name'];


        if($_FILES['photo']['size'] !== 0){ // si la photo est modifiée
            //supprimer l'ancienne image 
            $sql = $mysql->prepare("select * from festivals where id = ?");
            $sql->bind_param('i', $idFestivale);
            $sql->execute();
            $row = $sql->get_result();
            $festivale = $row->fetch_assoc();
            $old_image = $festivale['photo'];
            $old_image_path = $upload_dir . $old_image;
            unlink($old_image_path);

            //charger la nouvelle image sur le serveur
            move_uploaded_file($_FILES['photo']['tmp_name'], $file); 

            //enregistrement des données
            $sql = $mysql->prepare('update festivals set nom = ?, localisation = ?, photo = ? where id = ?');
            $sql->bind_param('sssi', $nom, $localisation, $image_name, $idFestivale);
            $sql->execute();
            $sql->close();

        } else { // pas de photo chargée
            //store data in database
            $sql = $mysql->prepare('update festivals set nom = ?, localisation = ? where id = ?');
            $sql->bind_param('ssi', $nom, $localisation, $idFestivale);
            $sql->execute();
            $sql->close();
        }

        // mise à jour des dates festivales
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $date3 = $_POST['date3'];
        

        $d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        $d3 = new DateTime($date3);

        $date1 = $d1->format('Y-m-d');
        $date2 = $d2->format('Y-m-d');
        $date3 = $d3->format('Y-m-d');
        
        // supprimer les anciennes
        $requete = $mysql->prepare("delete from datesfestivales where id_festivale = ?");
        $requete->bind_param("i", $idFestivale);
        $requete->execute();
        $requete->close();

        if($date1 != null) {
            $sql1 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
            $sql1->bind_param('si', $date1, $idFestivale);
        }

        if($date2 != null) {
            $sql2 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
            $sql2->bind_param('si', $date2, $idFestivale);
        }

        if($date3 != null) {
            $sql3 = $mysql->prepare("insert into datesfestivales (date, id_festivale) values(?, ?)");
            $sql3->bind_param('si', $date3, $idFestivale);
        }

        $sql1->execute();
        $sql2->execute();
        $sql3->execute();

        $sql1->close();
        $sql2->close();
        $sql3->close();

        $mysql->close();

        $_SESSION['message'] = 'Festivale modifié !';
        header("Location: ../../vues/admin/festivales.php");
        die();
    }   
    

    function file_extension($file_name){
        return strtolower(substr($file_name, strripos($file_name, '.')));
    }
?>