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

// La recherche 

if(isset($_POST['search'])){
    $search = htmlspecialchars(trim($_POST['search']));

    $selectSearch = "SELECT titreLivre, imageLivre, resumeLivre, dateAjout FROM livres AS Produits WHERE titreLivre LIKE '%$search%'
    UNION 
    SELECT titreFilm, imageFilm, resumeFilm, dateAjout FROM film AS Produits WHERE titreFilm LIKE '%$search%'
    UNION 
    SELECT titreJeu, imageJeu, resumeJeu, dateAjout FROM jeux AS Produits WHERE titreJeu LIKE '%$search%'";

    $reqSelectSearch = $db->prepare($selectSearch);
    $reqSelectSearch->execute();

    $produits = array();

    while($data = $reqSelectSearch->fetchObject()){
        array_push($produits, $data);
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
                <a class="dropdown-item d-flex justify-content-center bg-secondary text-white" href="ajoutFilm.php">Ajouter un film</a>
                <a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.php">Ajouter un Jeu</a>
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
    <div class="row mt-5">
    <?php
    foreach($produits as $produit){
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card h-100">
                <img src="../../public/image/<?= $produit->imageLivre ?>" alt="<?= $produit->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center "><?= $produit->titreLivre ?></h5>
                    <p class="card-text"><?= $produit->resumeLivre ?></p>
                </div>
                <div class="card-footer">
						<p class="d-flex justify-content-center">Ajouté le <?= $produit->dateAjout?></p>
				</div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>

<?php
footer();