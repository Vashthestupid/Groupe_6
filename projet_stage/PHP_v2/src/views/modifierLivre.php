<?php

if (isset($_POST['valider'])) {
    if (empty($_POST['titre']) || empty($_POST['auteur']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['image'])) {
        echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
    } else {
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
		<form id="formLivre" method="post" class="offset-md-2 col-md-8">
			<div class="form-group">
				<label for="titre" class="d-flex justify-content-center">Titre du livre</label>
				<input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titre">
			</div>
			<div class="form-group">
				<label for="auteur" class="d-flex justify-content-center">Auteur du livre</label>
				<input class="form-inline d-flex mx-auto w-75" type="text" name="auteur" id="auteur">
			</div>
			<div class="form-group">
				<label for="resume" class="d-flex justify-content-center">Résumé du livre</label>
				<textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resume"></textarea>
			</div>
			<div class="form-group">
				<label for="genre" class="d-flex justify-content-center">Genre</label>
				<select class="d-flex mx-auto w-75" name="genre" id="genre">
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
				<label for="prix" class="d-flex justify-content-center">Prix du livre</label>
				<input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix">
			</div>
			<div class="form-group">
				<label for="image" class="d-flex justify-content-center">Image du livre</label>
				<input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="image">
			</div>
			<input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
		</form>>
	</div>
</div>
