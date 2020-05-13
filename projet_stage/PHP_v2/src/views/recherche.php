<?php

if (isset($_POST['search'])) {
    $search = htmlspecialchars(trim($_POST['search']));

    $selectSearch = "SELECT titreLivre, imageLivre, resumeLivre, dateAjout FROM livres AS Produits WHERE titreLivre LIKE '%$search%'
    UNION 
    SELECT titreFilm, imageFilm, resumeFilm, dateAjout FROM film AS Produits WHERE titreFilm LIKE '%$search%'
    UNION 
    SELECT titreJeu, imageJeu, resumeJeu, dateAjout FROM jeux AS Produits WHERE titreJeu LIKE '%$search%'";

    $reqSelectSearch = $db->prepare($selectSearch);
    $reqSelectSearch->execute();

    $produits = array();

    while ($data = $reqSelectSearch->fetchObject()) {
        array_push($produits, $data);
    }
}
?>
<br>
<div class="container">
    <div class="row mt-5">
        <?php
        foreach ($produits as $produit) {
        ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <img src="../../public/image/<?= $produit->imageLivre ?>" alt="<?= $produit->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center "><?= $produit->titreLivre ?></h5>
                        <p class="card-text"><?= $produit->resumeLivre ?></p>
                    </div>
                    <div class="card-footer">
                        <p class="d-flex justify-content-center">Ajouté le <?= $produit->dateAjout ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>