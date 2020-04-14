<?php
include '../config/config.php';
include '../models/connect.php';

$db = connection();


$deleteLoc = "DELETE FROM location
WHERE location.idLocation = :idLocation";

$reqDeleteLoc = $db->prepare($delete);
$reqDeleteLoc->bindParam(':idLocation', $_GET['id']);
$reqDeleteLoc->execute();
header('Location: gerer_les_biens.php');


$deleteDetail = "DELETE FROM detail
WHERE detail.iddetail = :iddetail";

$reqDeleteDetail = $db->prepare($deleteDetail);
$reqDeleteDetail->bindParam('iddetail', $_GET['id']);
$reqDeleteDetail->execute();
?>