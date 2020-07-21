<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "DELETE FROM produit
WHERE produit.id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

// header('Location: /admin/produits');
echo '<meta http-equiv="refresh" content="0; url=/admin/produits"/>';