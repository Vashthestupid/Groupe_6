<?php

$select = "SELECT * FROM type";

$reqSelect = $db->prepare($select);
$reqSelect->execute();

$types = array();

while ($data = $reqSelect->fetchObject()) {
    array_push($types, $data);
}

if(isset($_POST['valider'])){
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prix = intval($_POST['prix']);
    $desc = htmlspecialchars(trim($_POST['description']));
    $type = intval($_POST['type']);
    $image = htmlspecialchars(trim($_POST['image']));

    // on verifie si le produit n'existe pas déjà 

    $selectIfExiste = "SELECT COUNT('nomProduit') AS nb FROM produit WHERE nomProduit = :nomProduit";

    $reqSelectifExiste = $db->prepare($selectIfExiste);
    $reqSelectifExiste->bindParam(':nomProduit', $nom);
    $reqSelectifExiste->execute();

    $nb = $reqSelectifExiste->fetchObject();

    if($nb->nb == 0){

        $insert = "INSERT INTO produit(nomProduit,prixProduit,descProduit,type_idtype,imageProduit) VALUES(:nom,:prix,:desc,:type,:image)";

        $reqInsert = $db->prepare($insert);
        $reqInsert->bindParam(':nom', $nom);
        $reqInsert->bindParam(':prix', $prix);
        $reqInsert->bindParam(':desc', $desc);
        $reqInsert->bindParam(':type', $type);
        $reqInsert->bindParam(':image', $image);
        $reqInsert->execute();

        // header('Location: /admin/produits');
        echo '<meta http-equiv="refresh" content="0; url=/admin/produits"/>';
    } else {
        echo 'Le produit existe déjà dans notre base de données';
    }
}
?>
<div id="newProduit">
    <h2 class=" titleForm d-flex justify-content-center">Ajouter un nouveau produit</h2>
    <form method="post" class="offset-md-2 col-md-8 mt-5">
        <div class="form-group">
            <label for="nom" class="d-flex justify-content-center">Nom du produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom">
        </div>
        <div class="form-group">
            <label for="prix" class="d-flex justify-content-center">Prix du produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix">
        </div>
        <div class="form-group">
            <label for="description" class="d-flex justify-content-center">Description du produit</label>
            <textarea class="form-inline d-flex mx-auto w-75" name="description" id="description" cols="30" rows="4"></textarea>
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