<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

$id = $_GET['id'];
var_dump($id);
$recup = "  SELECT *
            FROM products
            WHERE id = $id ";
$reqRecup = $db->prepare($recup);
$reqRecup->execute();

$produits = array();

while ($data = $reqRecup->fetchObject()) {
    array_push($produits, $data);
}
?>
        <h2>Modifier le produit</h2>
        <hr>
<?php
foreach($produits as $produit){
?>

        <form action='updateTraitement.php' method="post">
            <div class="form-group">
                <label for="nom"><?= $produit->name?></label>
                <input class="form-control" type="text" name="nvName" id="nom">
            </div>
            <div class="form-group">
                <label for="description"><?= $produit->description?></label>
                <input class="form-control" type="text" name="nvDescribe" id="description">
            </div>
            <div class="form-group">
                <label for="prix"><?= $produit->price?></label>
                <input class="form-control" type="number" name="nvPrice" id="prix">
            </div>
            <input class="btn btn-dark" type="submit" value="Valider">
        </form>
        <br>
        <a href="../../products.php">Retourner à la liste des produits.</a>
<?php
}
footer();
?>