<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

session_start();
if(isset($_SESSION['login'])){
    $mail = $_SESSION['login'];
} else {
    $email = "";
}

if (empty($_POST['titre']) || empty($_POST['realisateur']) || empty($_POST['resume']) || empty($_POST['genre'])|| empty($_POST['prix']) || empty($_POST['image'])) {
	echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
}

if(isset($_POST['titre']) && isset($_POST['realisateur']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_GET['id'])){
	
	$titre = htmlspecialchars(trim($_POST['titre']));
	$realisateur = htmlspecialchars(trim($_POST['realisateur']));
	$resume = htmlspecialchars(trim($_POST['resume']));
	$genre = htmlspecialchars(trim($_POST['genre']));
	$prix = intval($_POST['prix']);
    $image = htmlspecialchars(trim($_POST['image']));
    $id = intval($_GET['id']);

	// On verifie si le produit n'est pas déjà présent dans la base de données

	$selectExist = "SELECT COUNT(titreFilm) AS nb
	FROM film
	WHERE film.titreFilm = :titreFilm";

	$reqSelectExist = $db->prepare($selectExist);
	$reqSelectExist->bindParam('titreFilm', $titre);
	$reqSelectExist->execute();

	$nb = $reqSelectExist->fetchObject();

	// Si le résultat est égal à 0 alors on insére le produit. Sinon on affiche un message d'erreur

	if($nb->nb == 0){

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

		echo '<div class="alert alert-success">Votre produit a bien été modifié</div>';
	} else {
        echo '<div class="alert alert-danger">Le produit existe déjà dans notre base de données</div>';
    }
}

?>
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="../../index.php">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="connexion.php">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="livre.php">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="film.php">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="jeu.php">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="ajoutLivre.php">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutFilm.php">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center bg-secondary text-white" href="ajoutJeu.php">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
		</ul>
		<form action="recherche.php" method="post" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
    </nav>

    <div class="container">
		<br>
		<h2 class="titleForm d-flex justify-content-center">Modifier un film</h2>
		<div id="modifierFilm">
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
				<input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
			</form>>
		</div>
    </div>
<?php
footer();