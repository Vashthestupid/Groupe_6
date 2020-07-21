<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

// Récupérer toutes les infos du produit grâce à son id

$select = "SELECT * FROM produit
WHERE id = :id";

$reqSelect = $db->prepare($select);
$reqSelect->bindParam(':id', $id);
$reqSelect->execute();

$produit = $reqSelect->fetchObject();

// récupérer les infos de la table type pour les utiliser dans le formulaire

$selectType = "SELECT * FROM type";

$reqSelectType = $db->prepare($selectType);
$reqSelectType->execute();

$types = array();

while ($data = $reqSelectType->fetchObject()) {
    array_push($types, $data);
}

// On effectue la modification

if (isset($_POST['valider'])) {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prix = htmlspecialchars(trim($_POST['prix']));
    $desc = htmlspecialchars(trim($_POST['description']));
    $type = intval($_POST['type']);
    $image = htmlspecialchars(trim($_POST['image']));


    $update = "UPDATE produit 
        SET nomProduit = :nom,
        prixProduit = :prix,
        descProduit = :desc,
        type_idtype = :type,
        imageProduit = :image
        WHERE id = :idProduit";

    $reqUpdate = $db->prepare($update);
    $reqUpdate->bindParam(':nom', $nom);
    $reqUpdate->bindParam(':prix', $prix);
    $reqUpdate->bindParam(':desc', $desc);
    $reqUpdate->bindParam(':type', $type);
    $reqUpdate->bindParam(':image', $image);
    $reqUpdate->bindParam(':idProduit', $id);
    $reqUpdate->execute();

    // header('Location: /admin/produits');
    echo '<meta http-equiv="refresh" content="0; url=/admin/produits"/>';
}

?>
<div id="editProduit" class="mt-5">
    <h2 class=" titleForm d-flex justify-content-center">Ajouter un nouveau produit</h2>
    <form method="post" class="offset-md-2 col-md-8 mt-5">
        <div class="form-group">
            <label for="nom" class="d-flex justify-content-center">Nom du produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom" value="<?= $produit->nomProduit ?>">
        </div>
        <div class="form-group">
            <label for="prix" class="d-flex justify-content-center">Prix du produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix" value='<?= $produit->prixProduit ?>'>
        </div>
        <div class="form-group">
            <label for="description" class="d-flex justify-content-center">Description du produit</label>
            <textarea class="form-inline d-flex mx-auto w-75" name="description" id="description" cols="30" rows="4"><?= $produit->descProduit ?></textarea>
        </div>
        <div class="form-group">
            <label for="type" class="d-flex justify-content-center">Type du produit</label>
            <select class="form-inline d-flex mx-auto w-75" name="type" id="type">
                <?php
                foreach ($types as $type) {
                ?>
                    <option value="<?= $type->idtype ?>"><?= $type->nomType ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="d-flex justify-content-center">Image du produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="image">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>