<!doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../../public/css/main.css">
	<title>DivertiBuy</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="#">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="connexion.html">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="livre.html">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="film.html">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="jeu.html">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="ajoutLivre.html">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutFilm.html">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.html">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.html">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="gererProduits.html">Gérer les produits</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
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


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="../../public/js/main.js"></script>
	</body>
</html>