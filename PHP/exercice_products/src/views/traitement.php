<?php

include 'src/views/elements/header.php';
include 'src/views/elements/footer.php';
include 'src/config/config.php';
include 'src/models/connect.php';

head();

$db= connection();

if(!isset($_GET['id']) || !isset($_GET['name'])){
    header('Location: ../../products.php?');
}

if($_GET['action']=="delete"){
    $sqlSupprime = "DELETE FROM products
    WHERE id=".$_GET['id'];
    $reqSupprime = $db->prepare($sqlSupprime);
    $reqSupprime->execute;
    echo '<p class="alert-danger>Produit supprimé</p>
          <a href="../../products.php" class="btn-dark">Retour à la liste des produits</a>';
}

?>