<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db= connection();

$id = $_GET['id'];
$sqlDetail= "SELECT location.titreLocation,
            detail.Superficiecdetail,
            detail.nbPiecedetail,
            detail.descdetail
            FROM location
            INNER JOIN detail ON location.detail_iddetail = detail.iddetail
            WHERE location.idLocation = $id AND detail.iddetail = $id ";

//var_dump($sqlDetail);

$reqDetail = $db->prepare($sqlDetail);
$reqDetail->execute();

$locations = array();

while($data = $reqDetail->fetchObject()){
    array_push($locations, $data);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">DamienLocation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <table class="table table-hover mt-5">
        <thead class="thead-dark">
            <tr>
                <th>Nom du bien</th>
                <th>Nombre de pièces</th>
                <th>Superficie</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
<?php 
foreach($locations as $location){
?>
        <tr>
            <td><?= $location->titreLocation?></td>
            <td><?= $location->nbPiecedetail?> pièces</td>
            <td><?= $location->Superficiecdetail?>m²</td>
            <td><?= $location->descdetail?></td>
        </tr>
<?php
}
?>
        </tbody>
    </table>
<?php
footer();