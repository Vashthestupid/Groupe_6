<?php 

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';


$db = connection();
var_dump($db);


if(empty($_POST['name']) || empty($_POST['describe']) || empty($_POST['price']) || empty($_POST['cat'])){
    header('Location: ../../products.php');
    echo "Tous les champs doivent être renseignés";
}

if(isset($_POST['name']) && isset($_POST['describe']) && isset($_POST['price']) && isset($_POST['cat'])){
    $name = htmlspecialchars(trim($_POST['name']));
    $describe = htmlspecialchars(trim($_POST['describe']));
    $prix = htmlspecialchars(trim($_POST['price']));
    $cat = $_POST['cat'];
}

// Verifier si le produit existe

$verif =  " SELECT COUNT(*) as nb
            FROM products
            INNER JOIN categories ON products.categories_category_id = categories.id
            WHERE categories.id = :idCat ";

$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':idCat', $cat);
$reqVerif->execute();
$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    
    // Ajout des différents champs
    $InsertProducts = "INSERT INTO products(name,description,price,category_id) VALUES(:name,:describe,:price,:idCategory)";
    $reqInsertProducts = $db->prepare($InsertProducts);
    $reqInsertProducts->bindParam(':name',$name);
    $reqInsertProducts->bindParam(':describe',$describe);
    $reqInsertProducts->bindParam(':price',$prix);
    $reqInsertProducts->bindParam(':idCategory',$cat);
    $reqInsertProducts->execute();
    header('Location: ../../products.php');
} else {
    echo 'Votre produit n\'a pas été ajouté';
}

?>