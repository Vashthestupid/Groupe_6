<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

//Verifier si les champs envoyés sont null ou pas.

if(isset($_POST['nomAgence']) && isset($_POST['nom']) && isset($_POST['prenom'])){
    $agence = htmlspecialchars(trim($_POST['nomAgence']));
    $nomRep = htmlspecialchars(trim($_POST['nom']));
    $prenomRep = htmlspecialchars(trim($_POST['prenom']));
}

// Verifier si les valeurs ne sont pas déjà présentes dans la base de données.

$verif =  " SELECT COUNT(*) as nb
            FROM agence
            WHERE agence.nomAgence = :nomAgence";
$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':nomAgence',$agence);
$reqVerif->execute();
$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    // Si les champs envoyés ne correspondent à aucun champs présents dans la base de données, alors insérer les champs
    //envoyés via le formulaire.
    $insert = "INSERT INTO agence (nomAgence,nomRepreAgence,prenomRepreAgence) VALUES (:nameAgence,:nameRep,:firstnameRep)";
    $reqInsert = $db->prepare($insert);
    $reqInsert->bindParam(':nameAgence', $agence);
    $reqInsert->bindParam(':nameRep', $nomRep);
    $reqInsert->bindParam(':firstnameRep', $prenomRep);
    $reqInsert->execute();
} else {
    echo 'Les champs envoyés sont déjà présents dans la base de données.';
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajouter une agence <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <br>
    <div class="alert alert-danger">
        <?php
        // Verifier si les champs sont remplis.
        if(empty($_POST['nomAgence']) || empty($_POST['nom']) || empty($_POST['prenom'])){
            echo 'Tous les champs doivent être renseignés.';
        } else {
            echo 'Votre formulaire a bien été envoyé.';
        }
        ?>
    </div>
    <br>
    <h2>Ajout d'une agence</h2>
    <hr>
    <form method="post" action="ajoutAgence.php">
        <div class="form-group">
            <label for="nomAgence">Nom de l'agence</label>
            <input class="form-inline" type="text" name="nomAgence" id="nomAgence">
        </div>
        <div class="form-group">
            <label for="nomRep">Nom du representant</label>
            <input class="form-inline" type="text" name="nom" id="nomRep">
        </div>
        <div class="form-group">
            <label for="prenomrep">Prénom du représentant</label>
            <input class="form-inline" type="text" name="prenom" id="prenomRep">
        </div>
        <input type="submit" value="Envoyer">
    </form>
<?php
footer();
