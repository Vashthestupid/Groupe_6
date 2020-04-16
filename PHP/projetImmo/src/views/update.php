<?php
include 'elements/header.php';
include 'elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();
$db=connection();

if (isset($_POST['id'])&& isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['superficie']) && isset($_POST['nbpiece']) && isset($_POST['prix']) && isset($_POST['description']) && isset($_FILES['image']) && $_FILES['image']['error'] == 0)
{
    $id = intval($_POST['id']);
    $titre = htmlspecialchars(trim($_POST['titre']));
    $resume = htmlspecialchars(trim($_POST['resume']));
    $superficie = intval($_POST['superficie']);
    $nbPiece = intval($_POST['nbpiece']);
    $prix = intval($_POST['prix']);
    $description = htmlspecialchars(trim($_POST['description']));
    $image = $_FILES['image'];


    $sqlAffloc2='SELECT *
                    FROM location
                    INNER JOIN detail ON detail_iddetail=iddetail
                    WHERE idlocation=:idloc';
    $reqAffloc2=$db->prepare($sqlAffloc2);
    $reqAffloc2->bindParam(':idloc',$id);
    $reqAffloc2->execute();
    $affLoc2=array();
    while($data=$reqAffloc2->fetchObject())
    {
        array_push($affLoc2,$data);
    }
    foreach ($affLoc2 as $location)
    {
        $idDet=intval($location->detail_iddetail);
    }

    $updateDetail='UPDATE detail
                        SET Superficiecdetail = :super,
                            nbPiecedetail = :nb,
                            descdetail = :descr
                            WHERE iddetail = :id';
    $reqUpDateDetail=$db->prepare($updateDetail);
    $reqUpDateDetail->bindParam(':super',$superficie);
    $reqUpDateDetail->bindParam(':nb',$nbPiece);
    $reqUpDateDetail->bindParam(':descr',$description);
    $reqUpDateDetail->bindParam(':id',$idDet);
    $reqUpDateDetail->execute();

    $updateLocation='UPDATE location
                        SET titreLocation = :titre,
                            resumeLocation = :resume,
                            prixLocation = :prix,
                            imageLocation = :image,
                            dateModifLocation = NOW()
                            WHERE idlocation = :id_l';
    $reqUpDateLocation=$db->prepare($updateLocation);
    $reqUpDateLocation->bindParam(':titre',$titre);
    $reqUpDateLocation->bindParam(':resume',$resume);
    $reqUpDateLocation->bindParam(':prix',$prix);
    $reqUpDateLocation->bindParam(':image',$image);
    $reqUpDateLocation->bindParam(':id_l',$id);
    $reqUpDateLocation->execute();

    header('Location:gerer_les_biens.php?modify=done');



}