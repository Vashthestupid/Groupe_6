<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

$id = $_GET['id'];
var_dump($id);
$recup = "  SELECT products.name,
            products.description,
            products.price,
            categories.name as catName
            FROM products
            INNER JOIN categories ON products.category_id = categories.id
            WHERE products.id = $id ";
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

        <form method="post">
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
            <div class="form-group row">	
            <label for="categorie"><?= $produit->catName?></label>
            <select name="nvCat" id="categorie" class="form-control">
                <option value="1">Fashion</option>
                <option value="2" >Electronics</option>
                <option value="3" >Motors</option>
            </select>
        </div>
            <input class="btn btn-dark" type="submit" value="Modifier">
        </form>
        <br>
        <a href="../../products.php">Retourner à la liste des produits.</a>
<?php
}
footer();

if(isset($_POST['nvName']) && isset($_POST['nvDescribe']) && isset($_POST['nvPrice']) && isset($_POST['nvCat'])){
    $newName = htmlspecialchars(trim($_POST['nvName']));
    $newDescribe = htmlspecialchars(trim($_POST['nvDescribe']));
    $newPrice = intval($_POST['nvPrice']);
    $newCat = htmlspecialchars(trim($_POST['nvCat']));
}

$modif = "  UPDATE products
            SET "

?>