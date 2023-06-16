<?php

    include('../database/database.php');

    // chargement de 3 festivaliers à chaque clique sur le bouton charger plus

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // donné envoyé par l'ajax
        $last_idFestivalier = $_POST['last_idFestivalier'];
        
        // requete vers la base de données
        $sql = $mysql->prepare('select * from festivaliers join annoncesvehicules on festivaliers.id_vehicule = 
        annoncesvehicules.id where festivaliers.id_festivalier > ?
        order by festivaliers.id_festivalier 
        asc limit 3');
        $sql->bind_param('i', $last_idFestivalier);
        $sql->execute();
        $festivaliers = $sql->get_result();

        $result = '';

        if(mysqli_num_rows($festivaliers) > 0){
            while($festivalier = $festivaliers->fetch_array()){

                $last_festivalierId = $festivalier['id_festivalier'];
                $datePresence = join("-", array_reverse(explode("-", $festivalier["datePresence"])));
                $dateAller = join("-", array_reverse(explode("-", $festivalier["dateAller"])));
                $dateRetour = join("-", array_reverse(explode("-", $festivalier["dateRetour"])));

                $result .= '<div class="festivalier">
                <div class="nom">
                    <h2>Nom complet : 
                        <span class="fest-frame">' . 
                                $festivalier["nom"] . ' ' . $festivalier["prenom"] .
                        '</span>
                    </h2>
                </div>
                <div class="infos">
                    <p> Date de présence :
                        <span class="fest-frame">' .
                                $datePresence
                        . '</span>
                    </p>
                    <p>Véhicule utilisée : <span class="fest-frame">' . $festivalier["type"] . '</span></p>
                    <p>Places disponibles : <span class="fest-frame">' . $festivalier["placeDisponibles"] . ' place(s)</span></p>
                    <h4>
                        Date aller : <span class="fest-frame">' . $dateAller . '</span>
                    </h4>
                    <h4>
                        Date Retour : <span class="fest-frame">' . $dateAller . '</span>
                    </h4>
                </div>
            </div>';
            }

            $load = '<div class="load-more-festivalier">
                        <button 
                        style="cursor:pointer;display:block;margin: 30px auto;background-color: var(--Gold);
                        color:var(--Blacky);border-radius: 6px;text-align: center;
                        padding: 12px 40px;border: none;outline:none;"
                            class="load-more-btn">Charger plus</button>
                        <input type="hidden" value="' . $last_festivalierId . '" class="val_idFestivalier">
                    </div>';
        
        
            $json_response['festivaliers'] = $result;
            $json_response['load'] = $load;

        } else {
            $json_response['festivaliers'] = [];
        }

        // réponse json du réultat fonale de la requete
        echo json_encode($json_response);
    }

?>