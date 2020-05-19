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
	<?php
	if ($_SESSION['login'] && $_SESSION['role'] === 'admin') {
		echo "Bienvenue " . $_SESSION['prenom'] ;
	} elseif($_SESSION['login']) {
		echo "Bienvenue ". $_SESSION['prenom'];
	}
	?>
	<p class="d-flex justify-content-center lead">Voici les 6 derniers produits ajoutés</p>
	<div class="row">
		<?php
		foreach ($listeProduits as $produit) {
		?>
			<div class="mt-5 col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img src="../../public/image/<?= $produit->imageLivre ?>" alt="<?= $produit->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center "><?= $produit->titreLivre ?></h5>
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