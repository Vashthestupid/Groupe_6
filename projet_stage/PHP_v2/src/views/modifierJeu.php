<?php

//Si le bouton valider est cliqué et qu'il existe
if (isset($_POST['valider'])) {
	// Si les champs envoyés sont vides
    if (empty($_POST['titre']) || empty($_POST['studio']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['nbre']) || empty($_POST['online']) || empty($_POST['image'])) {
		// On affiche un message d'erreur indiquant que tous les champs ne sont pas remplis
		echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
    } else {
		// Si les champs envoyé ne sont pas vides et qu'ils existent alors on effectue la modification
        if (isset($_POST['titre']) && isset($_POST['studio']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['nbre']) && isset($_POST['online']) && isset($_POST['image']) && isset($_GET['id'])) {
            $titre = htmlspecialchars(trim($_POST['titre']));
            $studio = htmlspecialchars(trim($_POST['studio']));
            $resume = htmlspecialchars(trim($_POST['resume']));
            $genre = htmlspecialchars(trim($_POST['genre']));
            $prix = intval($_POST['prix']);
            $nbre = intval($_POST['nbre']);
			$online = htmlspecialchars(trim($_POST['online']));
			echo $_POST['online'];
            $image = htmlspecialchars(trim($_POST['image']));
            $id = intval($_GET['id']);


            $updateJeu = "UPDATE jeux 
			SET titreJeu = :titre,
			studioJeu = :studio,
			resumeJeu = :resume,
			prixJeu = :prix,
			nombreJoueurMax = :nbre,
			onlineJeu = :online,
			imageJeu = :image,
			genreJeu = :genre
			WHERE idJeu = :id";

            $reqUpdateJeu = $db->prepare($updateJeu);
            $reqUpdateJeu->bindParam(':titre', $titre);
            $reqUpdateJeu->bindParam(':studio', $studio);
            $reqUpdateJeu->bindParam(':resume', $resume);
            $reqUpdateJeu->bindParam(':prix', $prix);
            $reqUpdateJeu->bindParam(':nbre', $nbre);
            $reqUpdateJeu->bindParam(':online', $online);
            $reqUpdateJeu->bindParam(':image', $image);
            $reqUpdateJeu->bindParam(':genre', $genre);
            $reqUpdateJeu->bindParam(':id', $id);
            $reqUpdateJeu->execute();

			// Si tous c'est bien passé on affiche un message de succés
            echo '<div class="alert alert-success">Votre produit a bien été modifié</div>';
        }
    }
}
?>
<br>
<div class="container">
	<br>
	<h2 class="titleForm d-flex justify-content-center">Modifier un jeu</h2>
	<div id="modifierJeu">
		<?php
		formulaireJeux();
		?>
	</div>
</div>