<?php 

session_start();
if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
}else{
    $email = '';
}

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db= connection();

$select='SELECT *,Superficiecdetail,nbPiecedetail,descdetail
                    FROM location
                    INNER JOIN detail ON detail_iddetail=iddetail
                    WHERE idlocation=:idlocation';
$reqSelect=$db->prepare($select);
$reqSelect->bindParam(':idlocation',$_GET['id']);
$reqSelect->execute();
$afflocations=array();

while($data = $reqSelect->fetchObject()){
    array_push($afflocations,$data);
}

foreach($afflocations as $location){
    $iddetail = intval($location->detail_iddetail);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">DamienLocation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li> 
            <li class="nav-item ">
                <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item">
                    <a href="deconnexion.php" class="nav-link">Deconnexion</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <?php
    
    if (empty($_POST['titre']) && empty($_POST['resume']) && empty($_POST['superficie']) && empty($_POST['nbpiece']) && empty($_POST['prix']) && empty($_POST['description'])) {
        echo '<div class="alert alert-danger">Tous les champs doivent être renseignés.</div>';
    } else {
        echo '<div class="alert alert-success">Votre formulaire a bien été envoyé.</div>';
    }
    ?>
    <br>
    <h2>Modification du bien</h2>
    <div>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <?php foreach ($afflocations as $location)
            { 
            ?>
            <div class="form-group">
                <label for="titre" class="form"> ID :</label>
                <input type="number" name="id" value="<?= $location->idlocation ?>" id="id" class="form-inline" readonly>
            </div>
            <div class="form-group">
                <label for="titre" class="form"> Titre de l'annonce :</label>
                <input type="text" name="titre" value="<?= $location->titreLocation ?>" id="titre" class="form-inline">
            </div>
            <div class="form-group ">
                <label for="resume">Résumé de l'annonce :</label>
                <textarea maxlength="255" name="resume" id="resume" class="form-inline" required="required"><?= $location->resumeLocation ?></textarea>
            </div>
            <div class="form-group ">
                <label for="superficie">Superficie :</label>
                <input type="number" name="superficie" value="<?= $location->Superficiecdetail ?>" id="superficie" class="form-inline" >
            </div>
            <div class="form-group">
                <label for="nbpiece">Nombre de pièces :</label>
                <input type="number" name="nbpiece" value="<?= $location->nbPiecedetail ?>" id="nbpiece" class="form-inline">
            </div>
            <div class="form-group">
                <label for="prix">Prix : :</label>
                <input type="number" name="prix" value="<?= $location->prixLocation ?>" id="prix" class="form-inline">
            </div>
            </div>
            <div class="form-group">
                <label for="description">Description complète :</label>
                <textarea name="description" id="description"><?= $location->descdetail ?></textarea>
            </div>
            <div>
                <label for="image">Photographie du bien :</label><br>
                <input type="file" name="image" value="<?= $location->imageLocation ?>" id="image">
            </div>
            <div class="row">
                <input type="submit" class="btn btn-dark mt-4" value="Envoyer">
            </div>
        </form>
    <?php
    } 
    ?>
        </div>
</div>