<?php
if ($_SESSION['login']) {

    $selectPanier = "SELECT
    panier.idPanier,
    jeux.idJeu AS id,
    jeux.titreJeu AS titre,
    jeux.prixJeu AS prix
    FROM panier
    INNER JOIN jeux ON panier.jeux_idJeu = jeux.idJeu
    UNION 
    SELECT 
    panier.idPanier,
    film.idFilm AS id,
    film.titreFilm AS titre,
    film.prixFilm AS prix
    FROM panier
    INNER JOIN film ON panier.film_idFilm = film.idFilm
    UNION 
    SELECT
    panier.idPanier,
    livres.idLivre AS id,
    livres.titreLivre AS titre,
    livres.prixLivre AS prix
    FROM panier
    INNER JOIN livres ON panier.livres_idLivre = livres.idLivre
    WHERE users_idUser = :user
    ORDER BY prix
    DESC";

    $reqSelectPanier = $db->prepare($selectPanier);
    $reqSelectPanier->bindParam(':user', $_SESSION['user']);
    $reqSelectPanier->execute();

    $produits = array();

    while ($data = $reqSelectPanier->fetchObject()) {
        array_push($produits, $data);
    }

    // Afficher le prix total
    // On fait l'addition des prix des différents produits présents dans le panier
    $total = "SELECT SUM(prix) AS montant FROM panier";

    $reqTotal = $db->prepare($total);
    $reqTotal->execute();

    $total = array();

    while ($data = $reqTotal->fetchObject()) {
        array_push($total, $data);
    }

    // On récupère l'adresse et la ville de l'utilisateur connecté
    $mailUser = $_SESSION['login'];
    $selectInfoUser = "SELECT adresseUser, ville FROM users WHERE mailUser = :login";

    $reqSelectInfoUser = $db->prepare($selectInfoUser);
    $reqSelectInfoUser->bindParam(':login', $mailUser);
    $reqSelectInfoUser->execute();

    $adresses = array();

    while ($data = $reqSelectInfoUser->fetchObject()) {
        array_push($adresses, $data);
    }
} else {
    echo "Vous devez être connecté pour voir le contenu du panier.";
}

?>
<br>
<div class="container">
    <h2 class="titleForm d-flex justify-content-center">Votre Panier</h2>
    <br>
    <div class="row">
        <?php
        if (empty($produits)) {
            echo "<div class='alert alert-danger d-flex justify-content-center mx-auto'>Votre panier est vide.</div>";
        } else {
        ?>
            <div class="col-sm-12 offset-md-2 col-md-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Produits</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produits as $produit) {
                        ?>
                            <tr>
                                <td><?= $produit->titre ?></th>
                                <td><?= $produit->prix ?>€</td>
                                <td>
                                    <a href="<?= $router->generate('Supprimer_du_panier') ?>?id=<?= $produit->idPanier ?>">
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </a>
                                </td>
                            </tr>
                    </tbody>
                <?php
                        } ?>
                </table>
            </div>
            <div class="col-sm-12 offset-md-1 col-md-2">
                <table class="table">
                    <thead class="thead thead-dark">
                        <tr>
                            <th class="d-flex">Montant Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($total as $montant) {
                        ?>
                            <tr>
                                <td class="d-flex justify-content-center"><?= $montant->montant ?>€</td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            <?php
        }
            ?>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="adresseLivraison border border-secondary rounded bg-white">
                <br>
                <p class="lead d-flex justify-content-center">Votre adresse de livraison</p>
                <div class="informations col-sm-12 col-md-12">
                    <?php
                    if ($_SESSION['login']) {
                        foreach ($adresses as $adresse) {
                    ?>
                            <p>Adresse : <?= $adresse->adresseUser ?></p>
                            <p>Ville : <?= $adresse->ville ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="coordBanc border border-secondary rounded bg-white">
                <br>
                <p class="lead d-flex justify-content-center mt-10">Coordonnées bancaires</p>
                <div class="informationsBancaires col-sm-12 col-md-12">
                    <p>Titulaire de la carte : Tauveron Loïc</p>
                    <p>N° de la carte : 4*** **** **** **87</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="button d-flex justify-content-center">
        <a href="Recapitulatif">
            <button class="btn btn-secondary" type="submit">Passer à la commande</button>
        </a>
    </div>
</div>