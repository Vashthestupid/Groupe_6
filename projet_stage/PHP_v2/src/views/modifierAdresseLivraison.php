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
					<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.php">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
		</ul>
		<form action="recherche.php" method="post" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
    </nav>

    <div class="container">
        <h3 class="titleForm mt-4 d-flex justify-content-center">Modification de l'adresse de livraison</h3>
        <div class="col-sm-12 offset-md-2 col-md-8">
            <form action="panier.html">
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="adresse">Adresse</label>
                    <input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="ville">Ville</label>
                    <input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="pays">Pays</label>
                    <input class="form-inline d-flex mx-auto w-75" type="text" name="Pays" id="Pays">
                </div>
                <input class="btn btn-success d-flex mx-auto mt-5" type="submit" value="Valider">
            </form>
        </div>
    </div>
    
<?php
footer();