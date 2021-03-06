<?php
error_reporting(E_ALL &~ E_NOTICE);
include 'elements/header.php'; 
include 'elements/footer.php';
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

$idFilm = $_GET['id'];
$selectFilm = "SELECT * FROM film WHERE idFilm = :id";

$reqSelectFilm = $db->prepare($selectFilm);
$reqSelectFilm->bindParam(':id', $idFilm);
$reqSelectFilm->execute();

$films = array();

while($data = $reqSelectFilm->fetchObject()){
    array_push($films, $data);
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
		<?php
		if($_SESSION['login']){
			?>
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
		<?php
		}
		?>
		<?php
		if($_SESSION['login']){
			?>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="deconnexion.php">Deconnexion</a>
			</li>
			<?php
		}
		?>
	</ul>
	<form action="recherche.php" method="post" class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
	</form>
	</div>
</nav>
<div class="container">
	<?php
	if($_SESSION['login']){
		?>
		<div class="d-flex justify-content-center">
			<a class="mr-2" href="modifierFilm?id=<?= $idFilm?>">
				<button class="btn btn-warning">Modifier le produit</button>
			</a>
			<a href="supprimerFilm?id=<?= $idFilm?>">
				<button class="btn btn-danger text-dark">Supprimer le produit</button>
			</a>
		</div>
		<?php
	}
	?>
    <div class="row mt-5">
        <?php
        foreach ($films as $film) {
            ?>
        <div class="image d-flex justify-content-center col-sm-12 col-md-7">
            <img class="w-50" src="../../public/image/<?= $film->imageFilm?>" alt="Jaquette <?= $film->titreFilm?>">
        </div>
        <div class="titre&description col-sm-12 col-md-5">
            <div class="titre col-sm-12 col-md-12">
                <p class="d-flex mt-2 justify-content-center"><?= $film->titreFilm?></p>
            </div>
            <div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
                <p class="d-flex justify-content-center">Description</p>
                <p>Réalisateur: <?=$film->realisateurFilm?></p>
                <p>Genre: <?=$film->genreFilm?></p>
                <p>Prix: <?= $film->prixFilm?> €</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 col-sm-12 offset-md-3 col-md-6">
            <div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
                <p class="d-flex justify-content-center">Résumé</p>
                <p><?= $film->resumeFilm?></p>
            </div>
        </div>
    </div>
    <div class="row">
		<?php
		if($_SESSION['login']){
		?>
        <div class=" mt-5 mx-auto">
			<form action="panier.php" method="get">
				<input type="number" name="id" id="id" value="<? $idFilm ?>" hidden>
				<input class="btn btn-secondary" type="submit" name="panier" value="Ajouter au panier">
			</form>
		</div>
		<?php
		}
		?>
    </div>
    <?php
        }
    ?>
</div>