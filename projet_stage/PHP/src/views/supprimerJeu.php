<?php 

include 'elements/header.php'; 
include 'elements/footer.php';
include 'elements/fonctions.php';
include '../config/config.php';
include '../models/connect.php';

$db = connection();

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $deleteJeu = "DELETE FROM jeux WHERE idJeu = :id";
    
    $reqDeleteJeu = $db->prepare($deleteJeu);
    $reqDeleteJeu->bindParam(':id', $id);
    $reqDeleteJeu->execute();
}



header('Location: ../../index.php');

