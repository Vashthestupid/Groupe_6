<?php
error_reporting(E_ALL & ~E_NOTICE);

// On récupère l'id via le $_GET provenant de la page "film.php"
$idFilm = $_GET['id'];
$selectFilm = "SELECT * FROM film WHERE idFilm = :id";

$reqSelectFilm = $db->prepare($selectFilm);
$reqSelectFilm->bindParam(':id', $idFilm);
$reqSelectFilm->execute();

$films = array();

while ($data = $reqSelectFilm->fetchObject()) {
	array_push($films, $data);
}

// Si on clique sur le bouton ajout et qu'il existe,
// alors oon l'insert dans la table panier
if (isset($_POST['ajout'])) {
	$prix = intval($_POST['prix']);
	$insertPanier = "INSERT INTO panier(film_idFilm, prix, users_idUser) VALUES (:id, :prix, :idUser)";

	$reqInsertPanier = $db->prepare($insertPanier);
	$reqInsertPanier->bindParam(':id', $idFilm);
	$reqInsertPanier->bindParam(':prix', $prix);
	$reqInsertPanier->bindParam(':idUser', $_SESSION['user']);
	$reqInsertPanier->execute();

	echo "<div class='alert alert-success'>Le produit a été ajouté au panier</div>";
}

?>
<br>
<div class="container">
	<?php
	// Si la personne connectée est admin 
	// alors on affiche les boutons modifier et supprimer
	if ($_SESSION['login'] && $_SESSION['role'] === 'admin') {
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
			<div class="image d-flex justify-content-center col-sm-12 col-md-5">
				<img class="imageDetail" src="../../public/image/<?= $film->imageFilm ?>" alt="Jaquette <?= $film->titreFilm ?>">
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
				<form method="post">
					<input type="number" name="prix" id="prix" value="<?= $film->prixFilm?>" hidden>	
					<input type="submit" name="ajout" class="btn btn-secondary" value="Ajouter au panier">
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