<?php 
include 'elements/header.php'; 
include 'elements/footer.php';
include 'elements/fonctions.php';
include '../config/config.php';
include '../models/connect.php';

$db = connection();

session_start();
if(isset($_SESSION['login'])){
    $mail = $_SESSION['login'];
} else {
    $email = '';
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $deleteFilm = "DELETE FROM film WHERE idFilm = :id";
    
    $reqDeleteFilm = $db->prepare($deleteFilm);
    $reqDeleteFilm->bindParam(':id', $id);
    $reqDeleteFilm->execute();
}



header('Location: ../../index.php');

