<?php

    include('../database/database.php');

    // chargement de 3 annonces véhicules à chaque clique sur le bouton charger plus

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // donné envoyé par l'ajax
        $last_idAnnonce = $_POST['last_idAnnonce'];
        
        // requete vers la base de données
        $sql = $mysql->prepare('select * from annoncesvehicules join utilisateurs
        on annoncesvehicules.id_utilisateur = utilisateurs.idUtilisateur where annoncesvehicules.id > ?
        order by annoncesvehicules.id 
        asc limit 3');
        $sql->bind_param('i', $last_idAnnonce);
        $sql->execute();
        $annonces = $sql->get_result();

        $result = '';

        if(mysqli_num_rows($annonces) > 0){
            while($annonce = $annonces->fetch_array()){

                $last_annonceId = $annonce['id'];
                $dateAller = join("-", array_reverse(explode("-", $annonce["dateAller"])));
                $dateRetour = join("-", array_reverse(explode("-", $annonce["dateRetour"])));

                $result .= '<div class="annonce">
                <div class="title">
                    <h2>Véhicule : 
                        <!-- annonce title -->
                        <span class="bold">' .  $annonce["type"] . '</span>
                    </h2>
                </div>
                <div class="infos">
                    <div class="place-dispo">
                        <p> Places disponibles :
                            <span class="bold frame">' .
                                    $annonce["placeDisponibles"]
                                . ' place(s)
                            </span>
                        </p>
                    </div>
                    <div class="annonceur"> 
                        <h4>
                            Annonceur : <span class="bold">' . $annonce["login"] . '</span>
                        </h4>
                    </div>
                </div>
                <div class="dates"> 
                    <h4>
                        Date aller : ' . $dateAller .
                    '</h4>
                    <h4>
                        Date Retour : ' . $dateRetour .
                    '</h4>
                </div>
            </div>';
            }

            $load = '<div class="load-more-annonce">
                        <button 
                        style="cursor:pointer;display:block;margin: 30px auto;background-color: var(--Gold);
                        color:var(--Blacky);border-radius: 6px;text-align: center;
                        padding: 12px 40px;border: none;outline:none;"
                            class="load-more-btn">Charger plus</button>
                        <input type="hidden" value="' . $last_annonceId . '" class="val_idAnnonce">
                    </div>';
        
        
            $json_response['annonces'] = $result;
            $json_response['load'] = $load;

        } else {
            $json_response['annonces'] = [];
        }

        // réponse json du réultat fonale de la requete
        echo json_encode($json_response);
    }

?>