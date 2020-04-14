<?php

include '../config/config.php';
include '../models/connect.php';

$db = connection();


if(isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['status']) && isset($_POST['superficie']) && isset($_POST['nbrePiece']) && isset($_POST['desc'])){
   
   $modif = "UPDATE location
    INNER JOIN detail ON location.detail_iddetail = detail.iddetail
    SET location.titreLocation = :titre,
    location.resumeLocation = :resume,
    location.prixLocation = :price,
    location.imageLocation = :img,
    location.statusLocation = :status,
    location.detaModifLocation = NOW(),
    detail.Superficiecdetail = :superficie,
    detail.nbPiecedetail = :nombrePiece,
    detail.descdetail = :description
    WHERE location.idlocation = :idLoc AND detail.iddetail = :idDetail";

    $reqModif = $db->prepare($modif);
    $reqModif->bindParam(':titre', $_POST['name']);
    $reqModif->bindParam(':resume', $_POST['resume']);
    $reqModif->bindParam(':price', $_POST['price']);
    $reqModif->bindParam(':img', $_POST['img']);
    $reqModif->bindParam(':status', $_POST['status']);
    $reqModif->bindParam(':superficie', $_POST['superficie']);
    $reqModif->bindParam(':nombrePiece', $_POST['nbrePiece']);
    $reqModif->bindParam(':description', $_POST['desc']);
    $reqModif->bindParam(':idLoc', $_POST['id']);
    $reqModif->bindParam(':idDetail', $_POST['id']);
    $reqModif->execute();

    var_dump($modif);

    header('Location: gerer_les_biens.php');
}

// On modifie d'abord le detail 


?>