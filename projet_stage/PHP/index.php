<?php
include 'src/views/elements/header.php'; 
include 'src/views/elements/footer.php';
include 'src/views/elements/fonctions.php';
include 'src/config/config.php';
include 'src/models/connect.php';

head();

$db = connection();

// On récupère les données sur les 3 tables livres, film et jeux avec UNION

$selectProduits = "SELECT
livres.idLivre,
livres.titreLivre,
livres.resumeLivre,
livres.imageLivre,
livres.dateAjout
FROM livres
UNION
SELECT
film.idFilm,
film.titreFilm,
film.resumeFilm,
film.imageFilm,
film.dateAjout
FROM film
UNION
SELECT
jeux.idJeu,
jeux.titreJeu,
jeux.resumeJeu,
jeux.imagejeu,
jeux.dateAjout
FROM jeux
ORDER BY dateAjout
DESC
LIMIT 0,6";

$reqSelectProduits = $db->prepare($selectProduits);
$reqSelectProduits->execute();

$listeProduits = array();

while($data = $reqSelectProduits->fetchObject()){
	array_push($listeProduits, $data);
}
?>
	
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="#">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="src/views/connexion.php">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/livre.php">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/film.php">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/jeu.php">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutLivre.php">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutFilm.php">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutJeu.php">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="src/views/panier.php">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="src/views/gererProduits.php">Gérer les produits</a>
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
		<!-- <h1 class="titleForm">Bienvenue sur DIVERTIBUY</h1> -->
		<p class="d-flex justify-content-center lead">Voici les 6 derniers produits ajoutés</p>
		<div class="row">
		<?php
		foreach($listeProduits as $produit){
			?>
			<div class="mt-5 col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img src="../../public/image/<?= $produit->imageLivre ?>" alt="<?= $produit->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center "><?= $produit->titreLivre ?></h5>
						<p class="card-text"><?= $produit->resumeLivre ?></p>
					</div>
					<div class="card-footer">
						<form action="detail.php" method="get">
							<input type="number" name="id" id="id" value="<?= $produit->idLivre ?>" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		</div>
	</div>
<?php
footer();
