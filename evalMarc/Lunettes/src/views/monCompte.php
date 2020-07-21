<?php

// On récupère les infos de l'utilisateur
$sql = "SELECT * FROM user
WHERE user.id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $_SESSION['user']);
$req->execute();

$user = $req->fetchObject();

// On récupère les dernières commandes de l'utilsateur

$select = "SELECT commande.id, nomProduit,quantite, dateCommande FROM commande
INNER JOIN panier ON commande.panier_id = panier.id
INNER JOIN user ON panier.user_id = user.id
INNER JOIN produit ON panier.produit_id = produit.id 
WHERE user_id = :idUser
ORDER BY commande.id
DESC";

$reqSelect = $db->prepare($select);
$reqSelect->bindParam('idUser', $_SESSION['user']);
$reqSelect->execute();

$commandes = array();

while ($data = $reqSelect->fetchObject()) {
    array_push($commandes, $data);
}
?>
<div class="container">
    <p class="d-flex justify-content-center mt-5">Mon compte</p>
    <div class="row mt-5">
        <div class="col-sm-12 col-md-5">
            <p class="d-flex justify-content-center">Mes informations</p>
            <ul class="mt-2" id="infoUser">
                <li>Nom: <?= $user->nomUser ?></li>
                <li>Prenom: <?= $user->prenomUser ?></li>
                <li>Mail: <?= $user->mailUser ?></li>
                <li>Adresse: <?= $user->adresseUser ?></li>
                <li>Code Postal: <?= $user->cpUser ?></li>
                <li>Ville: <?= $user->villeUser ?></li>
            </ul>
            <a class="btn btn-sm btn-outline-dark mt-3 w-50 d-flex mx-auto" href="<?= $router->generate('modifierInfo') ?>?id=<?= $user->id ?>">Modifier vos informations</a>
        </div>
        <div class="col-sm-12 offset-md-1 col-md-6">
            <p class="d-flex justify-content-center">Mes commandes</p>
            <div class="table-responsive mt-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th>Nom du/des produits</th>
                            <th>Quantité</th>
                            <th>Date de la commande</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($commandes as $commande) {
                        ?>
                        <tr>
                            <td><?= $commande->nomProduit?></td>
                            <td><?= $commande->quantite?></td>
                            <td><?= $commande->dateCommande?></td>
                            <td>
                                <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('supprimerCommande')?>?id=<?= $commande->id?>">Supprimer</a>
                            </td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>