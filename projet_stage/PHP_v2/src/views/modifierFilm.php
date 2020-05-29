<?php

// Si le bouton valider est cliqué et qu'il existe
if (isset($_POST['valider'])) {
	// Si les champs envoyés sont vides
	if (empty($_POST['titre']) || empty($_POST['realisateur']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['image'])) {
		// On affiche un message d'erreur indiquant que tous les champs ne sont pas remplis
		echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
	} else {
		// Si les champs envoyé ne sont pas vides et qu'ils existent alors on effectue la modification
		if (isset($_POST['titre']) && isset($_POST['realisateur']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_GET['id'])) {
			$titre = htmlspecialchars(trim($_POST['titre']));
			$realisateur = htmlspecialchars(trim($_POST['realisateur']));
			$resume = htmlspecialchars(trim($_POST['resume']));
			$genre = htmlspecialchars(trim($_POST['genre']));
			$prix = intval($_POST['prix']);
			$image = htmlspecialchars(trim($_POST['image']));
			$id = intval($_GET['id']);


			$updateFilm = "UPDATE film 
			SET titreFilm = :titre,
			realisateurFilm = :realisateur,
			resumeFilm = :resume,
			prixFilm = :prix,
			imageFilm = :image,
			genreFilm = :genre
			WHERE idFilm = :id";

			$reqUpdateFilm = $db->prepare($updateFilm);
			$reqUpdateFilm->bindParam(':titre', $titre);
			$reqUpdateFilm->bindParam(':realisateur', $realisateur);
			$reqUpdateFilm->bindParam(':resume', $resume);
			$reqUpdateFilm->bindParam(':prix', $prix);
			$reqUpdateFilm->bindParam(':image', $image);
			$reqUpdateFilm->bindParam(':genre', $genre);
			$reqUpdateFilm->bindParam(':id', $id);
			$reqUpdateFilm->execute();

			// Si tous c'est bien passé on affiche un message de succés
			echo '<div class="alert alert-success">Votre produit a bien été modifié</div>';
		}
	}
}


?>
<br>
<div class="container">
	<br>
	<h2 class="titleForm d-flex justify-content-center">Modifier un film</h2>
	<div id="modifierFilm">
		<?php
		formulaireFilm();
		?>
	</div>
</div>