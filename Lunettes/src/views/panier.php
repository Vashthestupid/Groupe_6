<?php

$sql = "SELECT nomProduit,prixProduit,quantite, prixProduit * quantite AS prix FROM panier
INNER JOIN produit ON panier.produit_id = produit.id
WHERE panier.user_id = :idUser";

$req = $db->prepare($sql);
$req->bindParam(':idUser', $_SESSION['user']);
$req->execute();

$rows = array();

while($data = $req->fetchObject()){
    array_push($rows, $data);
}

$sum = "SELECT SUM(prixProduit * quantite) AS montant FROM panier
INNER JOIN produit ON panier.produit_id = produit.id
WHERE panier.user_id = :userId";

$reqSum = $db->prepare($sum);
$reqSum->bindParam(':userId', $_SESSION['user']);
$reqSum->execute();

$montant = $reqSum->fetchObject();

// validation de la commande 
if(isset($_POST['valider'])){

    $insert = "INSERT INTO commande(panier_id)
    SELECT id FROM panier";

    $reqInsert = $db->prepare($insert);
    $reqInsert->execute();

    echo "Votre commande à bien été passée";
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 offset-md-2 col-md-8">
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom du Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td><?= $row->nomProduit ?></td>
                                <td><?= $row->quantite ?></td>
                                <td><?= $row->prixProduit ?>$</td>
                                <td><?= $row->prix?>$</td>
                            </tr>
                    </tbody>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="col-sm-12 offset-md-4 col-md-4">
            <div class="table-responsive">
                <table class="table mt-5">
                    <tbody>
                        <tr>
                            <td><strong>Montant Total</strong></td>
                            <td><?= $montant->montant?>$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="btnValider d-flex mx-auto mt-3">
            <form method="post">
                <input class="btn btn-outline-dark" type="submit" name="valider" value="Valider la commande">
            </form>
        </div>
    </div>
</div>