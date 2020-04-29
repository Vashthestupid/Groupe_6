<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
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
					<a class="dropdown-item d-flex justify-content-center bg-secondary text-white" href="ajoutJeu.php">Ajouter un Jeu</a>
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
		<h2 class="titleForm d-flex justify-content-center">Formulaire d'ajout d'un film</h2>
		<div id="ajoutLivre">
			<form method="post" class="offset-md-2 col-md-8">
				<div class="form-group">
					<label for="titre" class="d-flex justify-content-center">Titre du jeu</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titre">
				</div>
				<div class="form-group">
					<label for="studio" class="d-flex justify-content-center">Studio de developpement</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="studio" id="studio">
				</div>
				<div class="form-group">
					<label for="resume" class="d-flex justify-content-center">Résumé du jeu</label>
					<textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resume"></textarea>
                </div>
                <div class="form-group">
                    <label for="genre" class="d-flex justify-content-center">Genre</label>
                    <select class="d-flex mx-auto w-75"name="genre" id="genre">
                        <option value="Aventure">Aventure</option>
                        <option value="Science-Fiction">Science-Fiction</option>
                        <option value="Guerre">Guerre</option>
                        <option value="Course">Course</option>
                        <option value="FPS">First Person Shooter</option>
                        <option value="RPG">Role Playing Game</option>
                        <option value="Sport">Sport</option>
                        <option value="Plate-forme">Plate-forme</option>
                        <option value="Gestion">Gestion</option>
                        <option value="Jeux de société">Jeux de société</option>
                        <option value="Combat">Combat</option>
                        <option value="Simulation">Simulation</option>
                        <option value="MMO">Massively Multiplayer Online</option>
                    </select>
                </div>
				<div class="form-group">
					<label for="prix" class="d-flex justify-content-center">Prix du film</label>
					<input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix">
                </div>
                <div class="form-group">
					<label for="nbre" class="d-flex justify-content-center">Nombre de joueurs maximum</label>
					<input class="form-inline d-flex mx-auto w-75" type="number" name="nbre" id="nbre">
                </div>
                <div class="form-group">
                    <label for="online" class="d-flex justify-content-center">Jeux online</label>
                    <div class="checkbox d-flex justify-content-center">
                        <p class="mr-2">Oui</p>
                        <input class="mt-2 mr-2" type="radio" name="online" id="online" value="Oui">
                        <p class="ml-2 mr-2">Non</p>
                        <input class="mt-2" type="radio" name="online" id="online" value="Non">
                    </div>
				</div>
				<div class="form-group">
					<label for="image" class="d-flex justify-content-center">Image du jeu</label>
					<input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="image">
				</div>
				<input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
			</form>
		</div>
    </div>
<?php
footer();