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
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item ">
                    <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item ">
                    <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="connexion.php">Connexion<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <h2 class="d-flex justify-content-center">Formulaire de connexion</h2>
    <div class="row">
        <div class="col-md-12">
            <br>
            <form method="post" action="../../index.php" class="offset-md-5 col-md-2">
                <div class="form-group">
                    <label for="identifiant" class="d-flex justify-content-center">Email</label>
                    <input type="mail" name="mail" class="w-100">
                </div>
                <div class="form-group">
                    <label for="mot_de_passe" class="d-flex justify-content-center">Mot de passe</label>
                    <input type="password" name="mdp" class="w-100">
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Envoyer" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
