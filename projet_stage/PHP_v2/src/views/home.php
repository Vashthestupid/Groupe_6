<?php
error_reporting(E_ALL & ~E_NOTICE);

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

while ($data = $reqSelectProduits->fetchObject()) {
	array_push($listeProduits, $data);
}

?>

<br>
<div class="container">
	<!-- Souhaite la bienvenue à l'utilisateur en cas de connexion  -->
	<?php
	if ($_SESSION['login']) {
		echo "<div class='alert alert-success d-flex justify-content-center col-sm-12 col-md-3''>Bienvenue " . $_SESSION['prenom'] . "</div>";
	}
	// $_GET provenant de la page 'Recaptulatif'
	// En cas de validation de commande
	// Envoi ce message de validation
	if (isset($_GET['ok'])) {
		$message = htmlspecialchars(trim($_GET['ok']));
	?>
		<div class='alert alert-success d-flex justify-content-center col-sm-12 col-md-3'><?= $message ?></div>
	<?php
	}
	?>
	<p class="d-flex justify-content-center lead">Voici les 6 derniers produits ajoutés</p>
	<div class="row">
		<?php
		foreach ($listeProduits as $produit) {
		?>
			<div class="mt-2 col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img src="/public/image/<?= $produit->imageLivre ?>" alt="<?= $produit->imageLivre ?>" class="card-img-top mx-auto imageCard">
					<div class="card-body">
						<h6 class="card-title d-flex justify-content-center "><?= $produit->titreLivre ?></h6>
						<p class="card-text"><?= $produit->resumeLivre ?></p>
					</div>
					<div class="card-footer">
						<p class="d-flex justify-content-center">Ajouté le <?= $produit->dateAjout ?></p>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>