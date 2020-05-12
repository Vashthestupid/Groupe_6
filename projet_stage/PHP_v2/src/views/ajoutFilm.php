<?php

if(isset($_POST['valider'])){
	if (empty($_POST['titre']) || empty($_POST['realisateur']) || empty($_POST['resume']) || empty($_POST['genre'])|| empty($_POST['prix']) || empty($_POST['image'])) {
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
			<form id="formFilm" method="post" class="offset-md-2 col-md-8">
				<div class="form-group">
					<label for="titre" class="d-flex justify-content-center">Titre du Film</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titrefilm">
				</div>
				<div class="form-group">
					<label for="realisateur" class="d-flex justify-content-center">Réalisateur du film</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="realisateur" id="réalisateur">
				</div>
				<div class="form-group">
					<label for="resume" class="d-flex justify-content-center">Résumé du film</label>
					<textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resumeFilm"></textarea>
                </div>
                <div class="form-group">
                    <label for="genre" class="d-flex justify-content-center">Genre</label>
                    <select class="d-flex mx-auto w-75"name="genre" id="genreFilm">
                        <option value="Romance">Romance</option>
                        <option value="Science-Fiction">Science-Fiction</option>
                        <option value="Aventure">Aventure</option>
                        <option value="Fantastique">Fantastique</option>
                        <option value="Policier">Policier</option>
                        <option value="Anticipation">Anticipation</option>
                        <option value="Comédie">Comédie</option>
                        <option value="Horreur">Horreur</option>
                        <option value="Epouvante">Epouvante</option>
                        <option value="animation">Animation</option>
                    </select>
                </div>
				<div class="form-group">
					<label for="prix" class="d-flex justify-content-center">Prix du film</label>
					<input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prixFilm">
				</div>
				<div class="form-group">
					<label for="image" class="d-flex justify-content-center">Image du film</label>
					<input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="imageFilm">
				</div>
				<input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
			</form>
			<div class="erreur">
				<p id="message"></p>
			</div>
		</div>
    </div>
<?php
footer();