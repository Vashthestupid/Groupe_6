<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM produit
WHERE id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$row = $req->fetchObject();

if (isset($_POST['ajout'])) {
    $quantite = intval($_POST['quantite']);

    $insert = "INSERT INTO panier(quantite,dateCommande,produit_id,user_id) VALUES(:qte,NOW(),:idProduit,:idUser)";

    $reqInsert = $db->prepare($insert);
    $reqInsert->bindParam(':idProduit', $id);
    $reqInsert->bindParam(':qte', $quantite);
    $reqInsert->bindParam(':idUser', $_SESSION['user']);
    $reqInsert->execute();

    echo "Le produit à bien été ajouté au panier";
}
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 offset-md-1 col-md-4">
            <img class="showProductImage" src="public/images/<?= $row->imageProduit?>" alt="image <?= $row->nomProduit?>">
        </div>
        <div class="offset-md-1 col-md-5">
            <p class="nomProduit text-monospace d-flex justify-content-center"><?= $row->nomProduit?></p>
            <p><?= $row->prixProduit ?>$</p>
            <p><?= $row->descProduit ?></p>
            <form class="mt-5 w-50 d-flex mx-auto" action="" method="post">
                <input type="number" value="<?= $row->id ?>" hidden>
                <input class="btn btn-sm btn-outline-dark" type="submit" name="ajout" value="Ajouter au panier">
                <input class='ml-2' type="number" name="quantite" value="1">
            </form>
        </div>
    </div>
</div>