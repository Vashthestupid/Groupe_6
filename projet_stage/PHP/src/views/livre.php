<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

// On récupère les données de la table 'livres' 

$selectLivres = "SELECT livres.idLivre, 
					livres.imageLivre,
					livres.titreLivre,
					livres.resumeLivre
					FROM livres
					ORDER BY livres.idLivre
					DESC
					LIMIT 0,6
					";

$reqSelectLivres = $db->prepare($selectLivres);
$reqSelectLivres->execute();

$listeLivres = array();

while($data = $reqSelectLivres->fetchObject()){
	array_push($listeLivres, $data);
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
					<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.php">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.php">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="gererProduits.php">Gérer les produits</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">rechercher</button>
		</form>
		</div>
	</nav>
	<br>
	<div class="container">
		<p class="d-flex justify-content-center lead">Liste des livres </p>
		<?php
		foreach($listeLivres as $livre){
			?>
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card h-100">
						<img src="../../public/image/<?= $livre->imageLivre ?>" alt="<?= $livre->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
						<div class="card-body">
							<h5 class="card-title d-flex justify-content-center "><?= $livre->titreLivre ?></h5>
							<p class="card-text"><?= $livre->resumeLivre ?></p>
						</div>
						<div class="card-footer">
							<form action="detail.php" method="get">
								<input type="number" name="id" id="id" value="<?= $livre->idLivre ?>" readonly hidden>
								<input type="text" name="action" id="action" value="lire" readonly hidden>
								<input class="btn btn-secondary w-100" type="submit" value="Voir +">
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/le_morte_d_arthur.jpg" alt="Image livre le morte d'arthur">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Le morte d'Arthur</h5>
						<p class="card-text">Superbe roman narrant les innombrables aventures du roi arthur et de ses chevaliers jusqu'a son tragique décès.</p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/silmarillon.jpg" alt="Photo du livre le Silmarillion">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Le Silmarillion</h5>
						<p class="card-text">Roman narrant la création de l'univers, la naissance des premiers hommes ainsi que la lutte contre l'infâme Melkor et son serviteur Sauron.</p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/titans.png" alt="Affiche du manga shingeki no kyojin tome 19">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Shingeki no kyojin tome 19</h5>
						<p class="card-text">Eren et Ymir ont été capturés par Reiner et Bertholt mais le bataillon d'expedition vole à leur secours.</p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/marvel.jpg" alt="Couverture du tome 2 de War of realms">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">War of the realms tome 2</h5>
						<p class="card-text">La contre attaque contre Malekith commence !</p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/feu&sang.jpg" alt="couverture du livre Feu & Sang">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Feu & Sang</h5>
						<p class="card-text">L'origine des Targaryen et la création du trône de fer.</p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50  mx-auto" src="../../public/image/HP7.jpg" alt="Couverture du roman Harry Potter et les reliques de la mort">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Harry Potter et les reliques de la mort</h5>
						<p class="card-text">Ultime chapitre de la guerre contre Voldemort et ses partisans </p>
					</div>
					<div class="card-footer">
						<form action="detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>						
					</div>
				</div>
			</div>
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