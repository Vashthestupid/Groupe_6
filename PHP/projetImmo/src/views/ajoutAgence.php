<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

//Verifier si les champs envoyés sont null ou pas.

if(isset($_POST['nameAgence']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['adress'])
&& isset($_POST['adress2']) && isset($_POST['code']) && isset($_POST['state'])){
    $nomAgence = htmlspecialchars(trim($_POST['nameAgence']));
    $nomRep = htmlspecialchars(trim($_POST['nom']));
    $prenomRep = htmlspecialchars(trim($_POST['prenom']));
    $mdp = htmlspecialchars(trim($_POST['mdp']));
    $adresse = htmlspecialchars(trim($_POST['adress']));
    $adresse2 = htmlspecialchars(trim($_POST['adress2']));
    $codepostal = htmlspecialchars(trim($_POST['code']));
    $pays = htmlspecialchars(trim($_POST['state']));
}

// Verifier si les valeurs ne sont pas déjà présentes dans la base de données.

$verif =  " SELECT COUNT(*) as nb
            FROM agence
            INNER JOIN adresse ON agence.adresse_idadresse = adresse.idadresse
            WHERE agence.nomAgence = :nomAgence";
$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':nomAgence',$agence);
$reqVerif->execute();
$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    // Si les champs envoyés ne correspondent à aucun champs présents dans la base de données, alors insérer les champs
    //envoyés via le formulaire.
   
    // On commence par l'adresse

    $insertAdresse = "INSERT INTO adresse (adresse1,adresse2,codepostal,pays) VALUES (:adresse,:adresse2,:codepostal,:pays)";
    
    $reqInsertAdresse = $db->prepare($insertAdresse);
    $reqInsertAdresse->bindParam(':adresse',$adresse);
    $reqInsertAdresse->bindParam(':adresse2',$adresse2);
    $reqInsertAdresse->bindParam(':codepostal',$codepostal);
    $reqInsertAdresse->bindParam(':pays',$pays);
    $reqInsertAdresse->execute();

    $lastInsertIdAdresse = $db->lastInsertId();

    // Puis l'agence

    $insertAgence = "INSERT INTO agence (nomAgence,nomRepreAgence,prenomRepreAgence,mdpAgence,adresse_idadresse) VALUES (:nom,:nomRepre,:prenom,:mdp,$lastInsertIdAdresse)";

    $reqInsertAgence = $db->prepare($insertAgence);
    $reqInsertAgence->bindParam(':nom', $nomAgence);
    $reqInsertAgence->bindParam(':nomRepre', $nomRep);
    $reqInsertAgence->bindParam(':prenom', $prenomRep);
    $reqInsertAgence->bindParam(':mdp', $mdp);
    $reqInsertAgence->execute();

    $listeAgences = array();

    while($data = $reqInsertAgence->fetchObject()){
        array_push($listeAgences, $data);
        var_dump($data);
        die();
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajouter une agence <span class="sr-only">(current)</span></a>
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
    <div class="d-flex justify-content-center">
    <?php
    // Verifier si les champs sont remplis.
    if(empty($_POST['nameAgence']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mdp']) || empty($_POST['adress'])
        || empty($_POST['adress2']) || empty($_POST['code']) || empty($_POST['state'])){
        echo '<div class="alert alert-danger w-50 d-flex justify-content-center">Tous les champs doivent être renseignés.</div>';
    } else {
        echo '<div class="alert alert-success w-50 d-flex justify-content-center">Votre formulaire a bien été envoyé.</div>';
    }
    ?>
    </div>
    <br>
    <h2 class="d-flex justify-content-center">Ajout d'une agence</h2>
    <hr>
    <form method="post" action="ajoutAgence.php" class="offset-md-2 col-md-8">
        <div class="form-group">
            <label for="nomAgence">Nom de l'agence</label>
            <input class="form-inline" type="text" name="nameAgence" id="nomAgence">
        </div>
        <div class="form-group">
            <label for="nomRep">Nom du representant</label>
            <input class="form-inline" type="text" name="nom" id="nomRep">
        </div>
        <div class="form-group">
            <label for="prenomrep">Prénom du représentant</label>
            <input class="form-inline" type="text" name="prenom" id="prenomRep">
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input class="form-inline" type="password" name="mdp" id="mot_de_passe">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="adresse" class="d-flex justify-content-center">Adresse</label>
                <input class="form-inline w-100" type="text" name="adress" id="adresse">
            </div>
            <div class="form-group col-md-6">
                <label for="adresse2" class="d-flex justify-content-center">Adresse2</label>
                <input class="form-inline w-100" type="text" name="adress2" id="adresse2">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="codepostal" class="d-flex justify-content-center">Code Postal</label>
                <input class="form-inline w-100" type="text" name="code" id="codepostal">
            </div>
            <div class="form-group col-md-6">
                <label for="pays" class="d-flex justify-content-center">Pays</label>
                <input class="form-inline w-100" type="text" name="state" id="pays">
            </div>
        </div>
        <div class="form-group d-flex justify-content-center">
            <input type="submit" value="Envoyer">
        </div>
    </form>
<?php
footer();
