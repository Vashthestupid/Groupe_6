<?php

$sql = "SELECT id,
nomProduit,
prixProduit,
imageProduit
FROM produit
INNER JOIN type ON produit.type_idtype = type.idtype
WHERE nomType = 'Femmes' ";

$req = $db->prepare($sql);
$req->execute();

$produits = array();

while ($data = $req->fetchObject()) {
    array_push($produits, $data);
}

?>
<div class="container">
    <div class="row mt-5">
        <?php
        foreach ($produits as $produit) {
        ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-75 d-flex mx-auto" style="width: 18rem;">
                    <img src="public/images/<?= $produit->imageProduit ?>" class="card-img-top d-flex mx-auto " alt="image <?= $produit->nomProduit ?>">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?= $produit->nomProduit ?></h5>
                        <p class="card-text mt-2s"><?= $produit->prixProduit ?>$</p>
                        <a href="<?= $router->generate('showProduit') ?>?id=<?= $produit->id ?>" class="btn btn-primary d-flex justify-content-center">Fiche Produit</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>