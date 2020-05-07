<?php
error_reporting(E_ALL &~ E_NOTICE);
include 'elements/header.php'; 
include 'elements/footer.php';
include 'elements/fonctions.php';
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

$idJeu = $_GET['id'];
$selectJeu = "SELECT * FROM jeux WHERE idJeu = :id";
$reqSelectJeu = $db->prepare($selectJeu);
$reqSelectJeu->bindParam(':id', $idJeu);
$reqSelectJeu->execute();

$jeux = array();

while($data = $reqSelectJeu->fetchObject()){
    array_push($jeux, $data);
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
		<?php
		if($_SESSION['login']){
			?>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Ajouter un produit
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item d-flex justify-content-center" href="ajoutLivre.php">Ajouter un livre</a>
				<a class="dropdown-item d-flex justify-content-center" href="ajoutFilm.php">Ajouter un film</a>
				<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.php">Ajouter un Jeu</a>
			</div>
		</li>
		<?php
		}
		?>
		<?php
		if($_SESSION['login']){
			?>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="deconnexion.php">Deconnexion</a>
			</li>
			<?php
		}
		?>
	</ul>
	<form action="recherche.php" method="post" class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
	</form>
	</div>
</nav>
<div class="container">
    <?php
    if($_SESSION['login']){
        ?>
        <div class=" mt-2 d-flex justify-content-center">
            <a class="mr-2" href="modifierJeu.php?id=<?= $idJeu?>">
                <button class="btn btn-warning">Modifier le produit</button>
            </a>
            <a href="supprimerJeu.php?id=<?= $idJeu?>">
                <button class="btn btn-danger text-dark">Supprimer le produit</button>
            </a>
        </div>
        <?php
    }
    ?>
    <div class="row mt-5">
        <?php
        foreach ($jeux as $jeu) {
            ?>
        <div class="image d-flex justify-content-center col-sm-12 col-md-7">
            <img class="w-50" src="../../public/image/<?= $jeu->imageJeu?>" alt="Jaquette <?= $jeu->titreJeu?>">
        </div>
        <div class="titre&description col-sm-12 col-md-5">
            <div class="titre col-sm-12 col-md-12">
                <p class="d-flex mt-2 justify-content-center"><?= $jeu->titreJeu?></p>
            </div>
            <div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
                <p class="d-flex justify-content-center">Description</p>
                <p>Studio de Développement: <?=$jeu->studioJeu?></p>
                <p>Genre: <?=$jeu->genreJeu?></p>
                <p>Prix: <?= $jeu->prixJeu?> €</p>
                <p>Nombre de joueurs maximum: <?= $jeu->nombreJoueurMax?> personne(s)</p>
                <p>Jeu Online: <?= $jeu->onlineJeu?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 col-sm-12 offset-md-3 col-md-6">
            <div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
                <p class="d-flex justify-content-center">Résumé</p>
                <p><?= $jeu->resumeJeu?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if($_SESSION['login']){
            ?>
            <div class=" mt-5 mx-auto">
                <a href="panier.php?id=<?=$idJeu?>">
                    <button class="btn btn-secondary">Ajouter au panier</button>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
        }
    ?>
</div>