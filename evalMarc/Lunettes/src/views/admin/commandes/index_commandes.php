<?php

$sql = "SELECT commande.id,nomUser, prenomUser, dateCommande FROM commande
INNER JOIN panier ON commande.panier_id = panier.id
INNER JOIN user ON panier.user_id = user.id
ORDER BY commande.id
DESC";

$req = $db->prepare($sql);
$req->execute();

$commandes = array();

while($data = $req->fetchObject()){
    array_push($commandes,$data);
}


?>
<div class="container">
    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>N° de commande</th>
                    <th>Nom de l'utilisateur</th>
                    <th>Prenom de l'utilisateur</th>
                    <th>Date de la commande</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commandes as $commande) {
                    ?>
                    <tr>
                        <td><?= $commande->id?></td>
                        <td><?= $commande->nomUser?></td>
                        <td><?= $commande->prenomUser?></td>
                        <td><?= $commande->dateCommande?></td>
                        <td>
                            <a href="<?= $router->generate('showCommande')?>?id=<?= $commande->id?>" class="btn btn-sm btn-outline-dark">Voir</a>
                            <a href="<?= $router->generate('editCommande')?>?id=<?= $commande->id?>" class="btn btn-sm btn-outline-dark">Editer</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>