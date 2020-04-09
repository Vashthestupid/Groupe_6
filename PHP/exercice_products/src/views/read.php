<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();


$id = $_GET['id'];
//var_dump($id);

$selectAll =  " SELECT products.id,
                products.name,
                products.description,
                products.price,
                categories.name as catName,
                products.created,
                products.modified
                FROM products
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.id = $id";

$reqSelect = $db->prepare($selectAll);
$reqSelect->execute();

$produits = array();

while($data = $reqSelect->fetchObject()){
    array_push($produits, $data);
}

?>
    <h2>Fiche produit</h2>
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Date Création</th>
                <th>Date Modification</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach($produits as $produit){
                ?> 
                    <td><?= $produit->id?></td>
                    <td><?= $produit->name?></td>
                    <td><?= $produit->description?></td>
                    <td><?= $produit->price?></td>
                    <td><?= $produit->catName?></td>
                    <td><?= $produit->created?></td>
                    <td><?= $produit->modified?></td>
                <?php   
                }
                ?>
            </tr>
        </tbody>
    </table>
    <a href="../../products.php">Retourner à la liste des produits.</a>
<?php
footer();
