<?php 

    // suppression d'un festivale

    include('../../database/database.php');

    // suppression d'un festivale

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if($_GET['id'] !== null){
            $idFestivale = $_GET['id'];
            
            //delete book image from server
            $requete1 = $mysql->prepare('select * from festivals where id = ?');
            $requete1->bind_param('i', $idFestivale);
            $requete1->execute();
            $row = $requete1->get_result();
            $festivale = $row->fetch_assoc();
            $requete1->close();

            //create file path
            $image_name = $festivale['photo'];
            $file_path = "../../imagesFestivales/$image_name";

            // check if file path exists
            if(file_exists($file_path)){
                if(unlink($file_path)){
                    //delete book from database
                    $requete2 = $mysql->prepare("delete from festivals where id = ?");
                    $requete2->bind_param('i', $idFestivale);
                    $requete2->execute();
                    $requete2->close();
                    $mysql->close();
                    
                    $_SESSION['message'] = 'Festivale supprimé !';
                    header("Location: ../../vues/admin/festivales.php");
                }
            }
        }
    }
?>