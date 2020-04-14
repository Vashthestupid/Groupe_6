<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

$select = "SELECT location.idlocation,
location.titreLocation,
location.resumeLocation,
location.prixLocation,
location.imageLocation,
location.statusLocation,
detail.Superficiecdetail,
detail.nbPiecedetail,
detail.descdetail
FROM location
INNER JOIN detail ON location.detail_iddetail = detail.iddetail
WHERE location.idlocation = :idLocation";

$reqSelect = $db->prepare($select);
$reqSelect->bindParam(':idLocation', $_GET['id']);
$reqSelect->execute();

$listelocations = array();

while($data = $reqSelect->fetchObject()){
    array_push($listelocations, $data);
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
                <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <?php
    foreach($listelocations as $location){
    ?>
    <h2>Modifier une location</h2>
    <hr>
    <form method="post" action="modifier.php">
        <div class="form-group">
            <input type="text" class="form-inline" name="name" id="nom" value="<?= $location->idlocation?>" hidden>
        </div>
        <div class="form-group">
            <label for="nom">Nom du bien</label>
            <input type="text" class="form-inline" name="name" id="nom">
        </div>
        <div class="form-group">
            <label for="resumé">Résumé du bien</label>
            <input type="text" class="form-inline" name="resume" id="resumé">
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-inline" name="price" id="prix">
        </div>
        <div class="form-group">
            <label for="image">Photo du bien</label>
            <input type="text" class="form_inline" name="img" id="image">
        </div>
        <div class="form-group">
            <select name="status" >Disponibilité
                <option value="0">Indisponible</option>
                <option value="1">Disponible</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mesure">Superficie</label>
            <input type="number" class="form-inline" name="superficie" id="mesure">
        </div>
        <div class="form-group">
            <label for="nbrePieces">Nombre de pièces</label>
            <input type="number" class="form-inline" name="nbrePiece" id="nbrePieces">
        </div>
        <div class="form-group">
            <label for="description">Description du bien</label>
            <textarea name="desc" class="form-inline" id="description" cols="30" rows="2"></textarea>
        </div>
        
        <input type="submit" value="Envoyer">
    </form>
    <?php
    }
    ?>
</div>
