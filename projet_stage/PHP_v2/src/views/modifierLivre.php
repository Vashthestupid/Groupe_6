<?php

// Si le bouton valider est cliqué et qu'il existe
if (isset($_POST['valider'])) {
	// Si les champs envoyés sont vides
	if (empty($_POST['titre']) || empty($_POST['auteur']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['image'])) {
		// On affiche un message d'erreur indiquant que tous les champs ne sont pas remplis
		echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
	} else {
		// Si les champs envoyé ne sont pas vides et qu'ils existent alors on effectue la modification
		if (isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_GET['id'])) {
			$titre = htmlspecialchars(trim($_POST['titre']));
			$auteur = htmlspecialchars(trim($_POST['auteur']));
			$resume = htmlspecialchars(trim($_POST['resume']));
			$genre = htmlspecialchars(trim($_POST['genre']));
			$prix = intval($_POST['prix']);
			$image = htmlspecialchars(trim($_POST['image']));
			$id = intval($_GET['id']);

			$updateLivre = "UPDATE livres 
			SET titreLivre = :titre,
			auteurLivre = :auteur,
			resumeLivre = :resume,
			prixLivre = :prix,
			imageLivre = :image,
			genreLivre = :genre
			WHERE idLivre = :id";

			$reqUpdateLivre = $db->prepare($updateLivre);
			$reqUpdateLivre->bindParam(':titre', $titre);
			$reqUpdateLivre->bindParam(':auteur', $auteur);
			$reqUpdateLivre->bindParam(':resume', $resume);
			$reqUpdateLivre->bindParam(':prix', $prix);
			$reqUpdateLivre->bindParam(':image', $image);
			$reqUpdateLivre->bindParam(':genre', $genre);
			$reqUpdateLivre->bindParam(':id', $id);
			$reqUpdateLivre->execute();

			// Si tous c'est bien passé on affiche un message de succés
			echo '<div class="alert alert-success">Votre produit a bien été modifié</div>';
		}
	}
}

?>
<br>
<div class="container">
	<br>
	<h2 class="titleForm d-flex justify-content-center">Modifier un livre</h2>
	<div id="modifierLivre">
		<?php
		formulaireLivre();
		?>
	</div>
</div>