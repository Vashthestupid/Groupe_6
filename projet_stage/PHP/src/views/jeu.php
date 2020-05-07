<?php
error_reporting(E_ALL &~ E_NOTICE);
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

$selectJeux = "SELECT 
	jeux.idJeu,
	jeux.imageJeu,
	jeux.titreJeu,
	jeux.resumeJeu 
	FROM jeux
	ORDER BY jeux.idJeu";

$reqSelectJeux = $db->prepare($selectJeux);
$reqSelectJeux->execute();

$listeJeux = array();

while($data = $reqSelectJeux->fetchObject()){
	array_push($listeJeux, $data);
	
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
            if ($_SESSION['login']) {
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
			<input class="form-control mr-sm-2"name="search" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
	</nav>
	<br>
	<div class="container">
		<p class="d-flex justify-content-center lead">Liste des jeux </p>
		<div class="row">
		<?php
		foreach($listeJeux as $jeu){
			?>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img src="../../public/image/<?= $jeu->imageJeu ?>" alt="<?= $jeu->imageJeu ?>" class="card-img-top w-50 h-50 mx-auto">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center "><?= $jeu->titreJeu ?></h5>
						<p class="card-text"><?= $jeu->resumeJeu?></p>
					</div>
					<div class="card-footer">
						<form action="detailJeu.php" method="get">
							<input type="number" name="id" id="id" value="<?= $jeu->idJeu ?>" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>
					</div>
				</div>
			</div>
		<?php
		}
		?>
        </div>
        <br>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
	</div>
<?php
footer();