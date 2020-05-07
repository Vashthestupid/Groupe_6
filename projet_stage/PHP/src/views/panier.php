<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

session_start();
if(isset($_SESSION['login'])){
    $mail = $_SESSION['login'];
} else {
    $email = "";
}


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
	<br>
	<div class="container">
        <h2 class="titleForm d-flex justify-content-center">Votre Panier</h2>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Produits</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Final Fantasy 7 Remake</th>
                            <td>58,33</td>
                            <td>
                                <form action="panier.html" method="get">
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-md-6">
                <table class="table">
                    <thead class="thead thead-dark">
                        <tr>
                            <th>Total</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Total TTC</th>
                            <td>70,00€</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 offset-md-3 col-md-6">
                <div class="adresseLivraison border border-secondary rounded bg-white">
                    <br>
                    <p class="lead d-flex justify-content-center">Votre adresse de livraison</p>
                    <div class="informations">
                        <p>Adresse : 3 rue Berlioz</p>
                        <p>Code Postal : 62000</p>
                        <p>Ville : ARRAS</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="modifierAdresseLivraison.html">modifier votre adresse de livraison</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 offset-md-3 col-md-6">
                <div class="coordBanc border border-secondary rounded bg-white">
                    <br>
                    <p class="lead d-flex justify-content-center mt-10">Coordonnées bancaires</p>
                    <div class="informationsBancaires">
                        <p>Titulaire de la carte : Tauveron Loïc</p>
                        <p>N° de la carte : 4*** **** **** **87</p>
                    </div>
                </div>
            </div>
        </div>
                <br>
                <div class="button d-flex justify-content-center">
                    <a href="recapitulatif.html"><button class="btn btn-secondary">Continuer</button></a>
                </div>
    </div>
<?php
footer();