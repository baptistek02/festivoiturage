window.onload = () => {
    // charger plus d'annonces véhicules start
    $(document).on('click', ".annonces .inner .load-more-annonce .load-more-btn", () => {

        // récuperation de l'identifiant du dernière annonce affichée
        var idAnnonce = Number($(".annonces .inner .load-more-annonce .val_idAnnonce").val());
        
        // requete vers le serveur
        $.ajax({
            url: '../controlleurs/charge-plus-annonces.php',
            method: 'POST',
            data: { 'last_idAnnonce': idAnnonce },
            dataType: 'json',
            beforeSend: () => {
                $('.annonces .inner .load-more-annonce .load-more-btn').text('Chargement...');
            },
            success: (response) => {
                setTimeout(() => {
                    if(response.annonces.length !== 0){
                        $('.annonces .inner .load-more-annonce').remove();
                        $('.annonces .inner .annonce-content').append(response.annonces);
                        $('.annonces .inner').append(response.load);
                    } else {
                        $('.annonces .inner .load-more-annonce').remove();
                    }
                }, 1000);
            }
        })

    });
    // charger plus d'annonces véhicules end

    // charger plus de festivalier start
    $(document).on('click', ".festivaliers .inner .load-more-festivalier .load-more-btn", () => {

        // récuperation de l'identifiant du dernière festivalier affichée
        var idFestivalier = Number($(".festivaliers .inner .load-more-festivalier .val_idFestivalier").val());

        // requete vers le serveur
        $.ajax({
            url: '../controlleurs/charge-plus-festivaliers.php',
            method: 'POST',
            data: { 'last_idFestivalier': idFestivalier },
            dataType: 'json',
            beforeSend: () => {
                $('.festivaliers .inner .load-more-festivalier .load-more-btn').text('Chargement...');
            },
            success: (response) => {
                setTimeout(() => {
                    console.log(response);
                    if(response.festivaliers.length !== 0){
                        $('.festivaliers .inner .load-more-festivalier').remove();
                        $('.festivaliers .inner .festivalier-content').append(response.festivaliers);
                        $('.festivaliers .inner').append(response.load);
                    } else {
                        console.log(response.festivaliers);
                        $('.festivaliers .inner .load-more-festivalier').remove();
                    }
                }, 1000);
            }
        })

    });
    // charger plus de festivalier end
}