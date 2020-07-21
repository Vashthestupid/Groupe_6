<?php

$sql = "SELECT * FROM produit
INNER JOIN type ON produit.type_idtype = type.idtype";

$req = $db->prepare($sql);
$req->execute();

$produits = array();

while ($data = $req->fetchObject()) {
    array_push($produits, $data);
}
?>
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du produit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produits as $produit) {
            ?>
                <tr>
                    <td><?= $produit->id ?></td>
                    <td><?= $produit->nomProduit ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('showProduit') ?>?id=<?= $produit->id ?>">Voir</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editProduit') ?>?id=<?= $produit->id ?>">Editer</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('deleteProduit') ?>?id=<?= $produit->id ?>">Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="new">
        <a class="btn btn-outline-dark" href="<?= $router->generate('newProduit') ?>">Créer un nouveau produit</a>
    </div>
</div>