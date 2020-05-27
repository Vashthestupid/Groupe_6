<?php

// On verifie si l'utilisateur a passé une commande ou plus
$selectCountCommandes = 'SELECT COUNT(*) AS nb
FROM commandes
WHERE commandes.idCommande = :idUser';

$reqSelectCountCommandes = $db->prepare($reqSelectCountCommandes);
$reqSelectCountCommandes->bindParam(':idUser', $_SESSION['user']);
$reqSelectCountCommandes->execute();

$nb = $reqSelectCountCommandes->fetchObject();

//Si l'utilisateur a effectué au moins une commande alors on les récupère pour les afficher

if ($nb->nb === 0) {
    echo "Vous n'avez commandé aucun produit :)";
} else {
    $selectCommandes = "SELECT commandes.livres_idLivre,
    livres.titreLivre,
    livres.imageLivre
    FROM commandes
    INNER JOIN livres ON commandes.livres_idLivre = livres.idLivre
    UNION 
    SELECT commandes.film_idFilm,
    film.titreFilm,
    film.imageFilm
    FROM commandes
    INNER JOIN film ON commandes.livres_idLivre = film.idFilm
    UNION 
    SELECT commandes.jeux_idJeu,
    jeux.titreJeu,
    jeux.imageJeu
    FROM commandes
    INNER JOIN jeux ON commandes.jeux_idJeu = jeux.idJeu
    WHERE commandes.users_idUser = :user";

    $reqSelectCommandes = $db->prepare($selectCommandes);
    $reqSelectCommandes->bindParam(':user', $_SESSION['user']);
    $reqSelectCommandes->execute();

    $commandes = array();

    while ($data = $reqSelectCommandes->fetchObject()) {
        array_push($commandes, $data);
    }
    
}

foreach($commandes as $commande){
    ?>
        <img src="public/image/<?= $commande->imageLivre?>" alt="Image du produit">
        <h2><?= $commande->titreLivre?></h2>
    <?php
}
?>


