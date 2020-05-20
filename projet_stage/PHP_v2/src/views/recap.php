<?php

// Afficher le contenu du panier 
// On récupère le titre du produit ainsi que son prix 
$selectFromPanier = "SELECT livres.titreLivre AS titre, panier.prix FROM panier
INNER JOIN livres ON panier.livres_idLivre = livres.idLivre
UNION 
SELECT film.titreFilm AS titre, panier.prix FROM panier
INNER JOIN film ON panier.film_idFilm = film.idFilm
UNION 
SELECT jeux.titreJeu AS titre, panier.prix FROM panier
INNER JOIN jeux ON panier.jeux_idJeu = jeux.idJeu ";

$reqSelectFromPanier = $db->prepare($selectFromPanier);
$reqSelectFromPanier->execute();

$produits = array();

while ($data = $reqSelectFromPanier->fetchObject()) {
    array_push($produits, $data);
}

// On récupère le prix total du panier
$selectPrixFromPanier = "SELECT SUM(prix) as montant FROM panier";

$reqSelectPrixFromPanier = $db->prepare($selectPrixFromPanier);
$reqSelectPrixFromPanier->execute();

$infos = array();

while ($data = $reqSelectPrixFromPanier->fetchObject()) {
    array_push($infos, $data);
}
?>
<br>
<div class="container">
    <h2 class="titleForm d-flex justify-content-center">Recapitulatif de votre panier</h2>
    <br>
    <div class="row">
        <div class="col-sm-12 offset-md-3 col-md-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($produits as $produit) {
                    ?>
                        <tr>
                            <td><?= $produit->titre ?></td>
                            <td><?= $produit->prix ?> €</td>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php
                    foreach ($infos as $info) {
                    ?>
                        <tr class="table-dark text-dark">
                            <td>Montant Total</td>
                            <td><?= $info->montant ?> €</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>