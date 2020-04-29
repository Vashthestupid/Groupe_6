<?php
include 'elements/header.php'; 
include 'elements/footer.php';
include 'elements/formulaires.php';
include '../config/config.php';
include '../models/connect.php';

head();
?>
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="../../index.php">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="connexion.php">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="livre.php">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="film.php">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="jeu.php">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="ajoutLivre.php">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutFilm.php">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.php">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="gererProduits.php">Gérer les produits</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
    </nav>

    <div class="container">
		<br>
		<div class="d-flex justify-content-center">
			<button id="btnInscription" type="button" class="btn btn-secondary mr-3">Inscription</button>
			<button id="btnConnexion" type="button" class="btn btn-secondary">Connexion</button>
		</div>
		<br>
        <div id="connexion" class="offset-md-2 col-md-8" >
            <h2 class=" titleForm d-flex justify-content-center">Formulaire de connexion</h2>
            <form action="../../index.html" method="post" id="formConnexion">
                <div class="form-group">
                    <label for="email" class="d-flex justify-content-center">Email</label>
                    <input class="form-inline d-flex mx-auto w-75" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
                    <input class="form-inline d-flex mx-auto w-75" type="password" name="mdp" id="mdp">
                </div>
                <input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
            </form> 
        </div>
		<div id="inscription">
			<h2 class=" titleForm d-flex justify-content-center">Formulaire d'inscription</h2>
			<form method="post" class="offset-md-2 col-md-8">
				<div class="form-group">
					<label for="nom" class="d-flex justify-content-center">Nom</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom">
				</div>
				<div class="form-group">
					<label for="prenom" class="d-flex justify-content-center">Prenom</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="prenom" id="prenom">
				</div>
				<div class="form-group">
					<label for="email" class="d-flex justify-content-center">Email</label>
					<input class="form-inline d-flex mx-auto w-75" type="email" name="emailInsc" id="emailInsc">
				</div>
				<div class="form-group">
					<label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
					<input class="form-inline d-flex mx-auto w-75" type="password" name="mdpInsc" id="mdpInsc">
				</div>
				<div class="form-group">
					<label for="mdp2" class="d-flex justify-content-center">Confirmation du mot de passe </label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="mdp2" id="mdp2">
				</div>
				<div class="form-group">
					<label for="adresse" class="d-flex justify-content-center">Adresse</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse">
				</div>
				<div class="form-group">
					<label for="ville" class="d-flex justify-content-center">Ville</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville">
				</div>
				<div class="form-group">
					<label for="pays" class="d-flex justify-content-center">Pays</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="pays" id="pays">
				</div>
				<input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
			</form>
		</div>
    </div>
<?php

footer();