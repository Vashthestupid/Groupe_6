<?php

$selectPanier = "SELECT
jeux.idJeu AS id,
jeux.titreJeu AS titre,
jeux.prixJeu AS prix
FROM panier
INNER JOIN jeux ON panier.jeux_idJeu = jeux.idJeu
UNION 
SELECT 
film.idFilm AS id,
film.titreFilm AS titre,
film.prixFilm AS prix
FROM panier
INNER JOIN film ON panier.film_idFilm = film.idFilm
UNION 
SELECT
livres.idLivre AS id,
livres.titreLivre AS titre,
livres.prixLivre AS prix
FROM panier
INNER JOIN livres ON panier.livres_idLivre = livres.idLivre";

$reqSelectPanier = $db->prepare($selectPanier);
$reqSelectPanier->execute();

$produits = array();

while ($data = $reqSelectPanier->fetchObject()) {
    array_push($produits, $data);
}

// Afficher le prix total
// On récupère la somme totale de tous les produits présents dans le panier 
$total = "SELECT SUM(prix) AS montant FROM panier";
 
$reqTotal = $db->prepare($total);
$reqTotal->execute();

$total = array();

while ($donnees = $reqTotal->fetchObject()) {
    array_push($total, $donnees);
}


?>
<br>
<div class="container">
    <h2 class="titleForm d-flex justify-content-center">Votre Panier</h2>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produits</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($produits as $produit) {
                    ?>
                        <tr>
                            <th scope="row"><?= $produit->titre ?></th>
                            <td><?= $produit->prix ?>€</td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>
        </div>
        <div class="col-sm-12 col-md-6">
            <table class="table">
                <thead class="thead thead-dark">
                    <tr>
                        <th>Total</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($total as $montant) {
                        ?>
                    <tr>
                        <td></td>
                        <td><?= $montant->montant?>€</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="adresseLivraison border border-secondary rounded bg-white">
                <br>
                <p class="lead d-flex justify-content-center">Votre adresse de livraison</p>
                <div class="informations">
                    <p>Adresse : 3 rue Berlioz</p>
                    <p>Code Postal : 62000</p>
                    <p>Ville : ARRAS</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="modifierAdresseLivraison.html">modifier votre adresse de livraison</a>
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
                <div class="informationsBancaires">
                    <p>Titulaire de la carte : Tauveron Loïc</p>
                    <p>N° de la carte : 4*** **** **** **87</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="button d-flex justify-content-center">
        <a href="recapitulatif.php"><button class="btn btn-secondary">Continuer</button></a>
    </div>
</div>