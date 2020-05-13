<?php
error_reporting(E_ALL & ~E_NOTICE);

$idFilm = $_GET['id'];
$selectFilm = "SELECT * FROM film WHERE idFilm = :id";

$reqSelectFilm = $db->prepare($selectFilm);
$reqSelectFilm->bindParam(':id', $idFilm);
$reqSelectFilm->execute();

$films = array();

while ($data = $reqSelectFilm->fetchObject()) {
	array_push($films, $data);
}

?>
<br>
<div class="container">
	<?php
	if ($_SESSION['login']) {
	?>
		<div class="d-flex justify-content-center">
			<a class="mr-2" href="<?= $router->generate('modifierFilm') ?>?id=<?= $idFilm ?>">
				<button class="btn btn-warning">Modifier le produit</button>
			</a>
			<a href="<?= $router->generate('supprimerFilm') ?>?id=<?= $idFilm ?>">
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
				<img class="w-50" src="../../public/image/<?= $film->imageFilm ?>" alt="Jaquette <?= $film->titreFilm ?>">
			</div>
			<div class="titre&description col-sm-12 col-md-5">
				<div class="titre col-sm-12 col-md-12">
					<p class="d-flex mt-2 justify-content-center"><?= $film->titreFilm ?></p>
				</div>
				<div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
					<p class="d-flex justify-content-center">Description</p>
					<p>Réalisateur: <?= $film->realisateurFilm ?></p>
					<p>Genre: <?= $film->genreFilm ?></p>
					<p>Prix: <?= $film->prixFilm ?> €</p>
				</div>
			</div>
	</div>
	<div class="row">
		<div class="mt-5 col-sm-12 offset-md-3 col-md-6">
			<div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
				<p class="d-flex justify-content-center">Résumé</p>
				<p><?= $film->resumeFilm ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<?php
			if ($_SESSION['login']) {
		?>
			<div class=" mt-5 mx-auto">
				<a href="<?= $router->generate('Panier')?>?id=<?= $idFilm?>">
					<button class="btn btn-secondary" type="submit">Ajouter au panier</button>
				</a>
			</div>
		<?php
			}
		?>
	</div>
<?php
		}
?>
</div>