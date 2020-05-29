<?php

// Si le bouton valider ets cliqué et qu'il existe
if (isset($_POST['valider'])) {
	// Si les champs envoyés sont vide
	// alors on affiche un message d'erreur
	if (empty($_POST['titre']) || empty($_POST['realisateur']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['image'])) {
		echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
	} else {
		if (isset($_POST['titre']) && isset($_POST['realisateur']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['image'])) {
			$titre = htmlspecialchars(trim($_POST['titre']));
			$realisateur = htmlspecialchars(trim($_POST['realisateur']));
			$resume = htmlspecialchars(trim($_POST['resume']));
			$genre = htmlspecialchars(trim($_POST['genre']));
			$prix = intval($_POST['prix']);
			$image = htmlspecialchars(trim($_POST['image']));

			// On verifie si le produit n'existe pas déjà dans la base de données.

			$selectExist = "SELECT COUNT(titreFilm) AS nb FROM film WHERE film.titreFilm = :titreFilm";
			$reqSelectExist = $db->prepare($selectExist);
			$reqSelectExist->bindParam(':titreFilm', $titre);
			$reqSelectExist->execute();

			$nb = $reqSelectExist->fetchObject();

			// Si le nombre retourné est égal à 0 alors on insère le produit dans la base de données. Sinoon on met un message d'erreur.
			if ($nb->nb == 0) {
				$insertFilm = 'INSERT INTO film (titreFilm,realisateurFilm,resumeFilm,prixFilm,imageFilm,genreFilm, dateAjout) VALUES(:titre,:real,:resume,:prix,:image,:genre, NOW())';
				$reqInsertFilm = $db->prepare($insertFilm);
				$reqInsertFilm->bindParam(':titre', $titre);
				$reqInsertFilm->bindParam(':real', $realisateur);
				$reqInsertFilm->bindParam(':resume', $resume);
				$reqInsertFilm->bindParam(':prix', $prix);
				$reqInsertFilm->bindParam(':image', $image);
				$reqInsertFilm->bindParam(':genre', $genre);
				$reqInsertFilm->execute();

				echo '<div class="alert alert-success">Votre produit à bien été ajouté</div>';
			} else {
				echo '<div class="alert alert-danger">Le produit existe déjà dans notre base de données</div>';
			}
		}
	}
}

?>
<br>
<div class="container">
	<br>
	<h2 class="titleForm d-flex justify-content-center">Formulaire d'ajout d'un film</h2>
	<div id="ajoutFilm">
		<?php
		formulaireFilm();
		?>
	</div>
</div>