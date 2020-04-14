<?php
include 'elements/header.php';
include 'elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();
$db=connection();

if (isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['superficie']) && isset($_POST['nbpiece']) && isset($_POST['prix']) && isset($_POST['description']))
{
    $sqlAffloc2='SELECT *
                    FROM location
                    INNER JOIN detail ON detail_iddetail=iddetail
                    WHERE idlocation=:idloc';
    $reqAffloc2=$db->prepare($sqlAffloc2);
    $reqAffloc2->bindParam(':idloc',$_POST['id']);
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
    $reqUpDateDetail->bindParam(':super',$_POST['superficie']);
    $reqUpDateDetail->bindParam(':nb',$_POST['nbpiece']);
    $reqUpDateDetail->bindParam(':descr',$_POST['description']);
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
    $reqUpDateLocation->bindParam(':titre',$_POST['titre']);
    $reqUpDateLocation->bindParam(':resume',$_POST['resume']);
    $reqUpDateLocation->bindParam(':prix',$_POST['prix']);
    $reqUpDateLocation->bindParam(':image',$_FILES['image']['name']);
    $reqUpDateLocation->bindParam(':id_l',$_POST['id']);
    $reqUpDateLocation->execute();

    header('Location:gerer_les_biens.php?modify=done');



}