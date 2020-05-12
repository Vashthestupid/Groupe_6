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
		<form action="recherche.php" method="post"  class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
	</nav>
	<br>
	<div class="container">
        <h2 class="titleForm d-flex justify-content-center">Recapitulatif de la commande</h2>
        <br>
        <div class="col-sm-12 offset-md-3 col-md-6">
            <div class="recap border border-secondary rounded bg-white">
                <h3 class="titleForm d-flex justify-content-center">Adresse de livraison</h3>
                <p>Adresse: 3 rue Berlioz</p>
                <p>Code Postale: 62000</p>
				<p>Ville: Arras</p>
				<h3 class="titleForm d-flex justify-content-center">Coordonnées bancaires</h3>
				<p>Titulaire de la carte: Tauveron Loïc</p>
				<p>N° de la carte: 4*** **** **** **87</p>
                <h3 class="titleForm d-flex justify-content-center">Produits</h3>
                <p>Final Fantasy VII Remake</p>
                <h3 class="titleForm d-flex justify-content-center">Total de la commande</h3>
                <p>70,00€</p>
            </div>     
        </div>
        <br>
        <div class="valid d-flex justify-content-center">
            <form action="panier.html" method="get">
                <input class="btn btn-success" type="submit" value="Valider la commande">
            </form>
        </div>
    </div>
<?php
footer();
