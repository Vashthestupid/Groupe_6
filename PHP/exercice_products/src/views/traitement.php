<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db= connection();

if(isset($_GET['name'])){
    $name = $_GET['name'];

    $delete = "DELETE FROM products WHERE products.name = $name";
    $reqDelete = $db->prepare($delete);
    $reqDelete->execute();
}

?>