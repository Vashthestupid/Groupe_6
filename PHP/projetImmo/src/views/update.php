<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

if(isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['status']) && isset($_POST['superficie']) && isset($_POST['nbrePiece']) && isset($_POST['desc'])){
    $nom = htmlspecialchars(trim($_POST['name']));
    $resume = htmlspecialchars(trim($_POST['resume']));
    $price = intval($_POST['name']);
    $img = htmlspecialchars(trim($_POST['img']));
    $status = intval($_POST['status']);
    $superficie = htmlspecialchars(trim($_POST['superficie']));
    $nbPiece = htmlspecialchars(trim($_POST['nbrePiece']));
    $description = htmlspecialchars(trim($_POST['desc']));
    $id = $_GET['id'];
}

// On modifie d'abord le detail 

$modifDetail = "UPDATE detail 
                SET detail.Superficiecdetail = :superficie,
                detail.nbPiecedetail = :nbPiece,
                detail.descdetail = :description
                WHERE detail.iddetail = :id";
$reqModifDetail = $db->prepare($modifDetail);
$reqModifDetail->bindParam(':superficie', $superficie);
$reqModifDetail->bindParam(':nbPiece', $nbPiece);
$reqModifDetail->bindParam(':description', $description);
$reqModifDetail->bindParam(':id', $id);
$reqModifDetail->execute();

$lastModifIdDetail = $db->lastInsertId();

// Puis la location

$modifLocation = "  UPDATE location
                    SET location.titreLocation = :nom,
                    location.resumeLocation = :resume,
                    location.prixLocation = :prix,
                    location.imageLocation = :img,
                    location.statusLocation = :status,
                    location.dateCreaLocation = NOW(),
                    location.dateModifLocation = NOW(),
                    location.detail_iddetail = $lastModifIdDetail
                    WHERE location.idlocation = :idLoc";
$reqModifLocation = $db->prepare($modifLocation);
$reqModifLocation->bindParam(':nom', $nom);
$reqModifLocation->bindParam(':resume', $resume);
$reqModifLocation->bindParam(':prix', $price);
$reqModifLocation->bindParam(':img', $img);
$reqModifLocation->bindParam(':status', $status);
$reqModifLocation->bindParam(':idLoc', $id);
$reqModifLocation->execute();





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

    <h2>Ajout d'une location</h2>
    <hr>
    <form method="post" action="update.php">
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
</div>
