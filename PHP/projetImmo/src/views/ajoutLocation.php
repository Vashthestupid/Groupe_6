<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

//Si les champs envoyés existent.
if(isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['status']) && isset($_POST['superficie']) && isset($_POST['nbrePiece'])
    && isset($_POST['desc'])){
        $nom = htmlspecialchars(trim($_POST['name']));
        $resume = htmlspecialchars(trim($_POST['resume']));
        $prix = intval($_POST['price']);
        $img = htmlspecialchars(trim($_POST['img']));
        $status = intval($_POST['nbrePiece']);
        $superficie = intval($_POST['superficie']);
        $nbrePiece = intval($_POST['nbrePiece']);
        $description = htmlspecialchars(trim($_POST['desc']));
    }

//verifie si les champs envoyés n'existent pas déjà dans la base de données.

$verif =  " SELECT COUNT(*) as nb
            FROM location
            INNER JOIN detail ON location.detail_iddetail = detail.iddetail
            WHERE location.titreLocation = :nomLocation";

$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':nomLocation', $nom);
$reqVerif->execute();

$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    // Si aucun des champs envoyés ne correspond à un champ présent dans la base de données, alors on les inséres dans celle-ci.
    //Tout d'abords le detail 

    $insertDetail = "INSERT INTO detail (Superficiecdetail,nbPiecedetail,descdetail) VALUES (:superficie,:nbPiece,:description)";

    $reqInsertDetail = $db->prepare($insertDetail);
    $reqInsertDetail->bindparam(':superficie', $superficie);
    $reqInsertDetail->bindparam(':nbPiece', $nbrePiece);
    $reqInsertDetail->bindparam(':description', $description);
    $reqInsertDetail->execute();

    $lastInsertIdDetail = $db->lastInsertId();

    //Puis la location

    $insertLocation = "INSERT INTO location (titreLocation,resumeLocation,prixLocation,imageLocation,statusLocation,dateCreaLocation,dateModifLocation,detail_iddetail)
     VALUES(:nomLocation,:resume,:prix,:img,:status,NOW(),NULL,$lastInsertIdDetail)";

    $reqInsertLocation = $db->prepare($insertLocation);
    $reqInsertLocation->bindParam(':nomLocation', $nom);
    $reqInsertLocation->bindParam(':resume', $resume);
    $reqInsertLocation->bindParam(':prix', $prix);
    $reqInsertLocation->bindParam(':img', $img);
    $reqInsertLocation->bindParam(':status', $status);
    $reqInsertLocation->execute();

    $listeLocations = array();

    while($data = $reqInsertLocation->fetchObject()){
        array_push($listeLocations, $data);
        var_dump($listeLocations);
    }
  
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajouter une location <span class="sr-only">(current)</span></a>
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
    <div class="alert alert-danger">
        <?php
        // Verifier si les champs sont remplis.
        if(empty($_POST['name']) || empty($_POST['resume']) ||empty($_POST['price']) || empty($_POST['img']) || empty($_POST['status']) || empty($_POST['superficie'])
            || empty($_POST['nbrePiece']) || empty($_POST['desc'])){

            echo 'Tous les champs doivent être renseignés.';
        } else {
            echo 'Votre formulaire a bien été envoyé.';
        }
        ?>
    </div>
    <h2>Ajout d'une location</h2>
    <hr>
    <form method="post" action="ajoutLocation.php">
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
