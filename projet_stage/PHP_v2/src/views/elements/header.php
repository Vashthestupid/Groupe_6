<?php
error_reporting(E_ALL & ~E_NOTICE);

function head()
{

?>
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
			<a class="navbar-brand" href="/">DivertiBuy</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="Inscription">Inscription/Connexion</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Livres">Livres</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Films">Film</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Jeux">Jeux Video</a>
					</li>
					<?php
					if ($_SESSION['login']) {
					?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Ajouter un produit
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item d-flex justify-content-center" href="AjoutLivre">Ajouter un livre</a>
								<a class="dropdown-item d-flex justify-content-center" href="AjoutFilm">Ajouter un film</a>
								<a class="dropdown-item d-flex justify-content-center" href="AjoutJeu">Ajouter un Jeu</a>
							</div>
						</li>
					<?php
					}
					?>
					<?php
					if ($_SESSION['login']) {
					?>
						<li class="nav-item">
							<a class="nav-link" href="Panier">Panier</a>
						</li>
					<?php
					}
					?>
					<?php
					if ($_SESSION['login']) {
					?>
						<li class="nav-item">
							<a class="nav-link" href="Deconnexion">Deconnexion</a>
						</li>
					<?php
					}
					?>
				</ul>
				<form action="Recherche" method="post" class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
				</form>
			</div>
		</nav>
	<?php
}
