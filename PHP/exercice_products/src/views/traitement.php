<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db= connection();

$id = $_GET['id'];
$delete = "DELETE FROM products WHERE id= $id";
$reqDelete = $db->prepare($delete);
$reqDelete->execute();
header('Location: ../../products.php');


?>