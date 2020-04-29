<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();
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
		<p class="d-flex justify-content-center lead">Liste des jeux </p>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/ff7.jpg" alt="Jaquette du jeu Final Fantasy 7 Remake">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Final Fantasy 7 Remake</h5>
						<p class="card-text">Magnifique jeu qui n'est pas juste un remake mais plutôt une réinterprétation.</p>
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
					<img class="card-img-top w-50 mx-auto" src="../../public/image/ZeldaOOT3D.png" alt="Jaquette du jeu Zelda Ocarina of Time 3D">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Zelda Ocarina Of Time 3D</h5>
						<p class="card-text">Remake 3D du jeu Zelda le plus connu et le plus adulé par les fans de la license.</p>
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
					<img class="card-img-top w-75 h-50 mx-auto" src="../../public/image/KH3.jpg" alt="Jaquette du jeu Kingdom Hearts 3">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Kingdom Hearts 3</h5>
						<p class="card-text">Chapitre final de l'arc Xehanort. Une dure bataille attend nos héros mais avant ils devront délivrer les 3 guerriers de la lumière: Aqua,Ventus et Terra.</p>
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
					<img class="card-img-top w-75 h-50 mx-auto" src="../../public/image/LostVikings.jpg" alt="Jaquette du jeu The Lost Vikings">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">The Lost Vikings</h5>
						<p class="card-text">Jeu très drôle ou l'on doit contrôler 3 vikings à tour de rôle et utiliser leurs aptitudes afin d'avancer dans les différents niveaux.</p>
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
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/nnk2.jpg" alt="Jaquette du jeu Ni no Kuni II Revenant Kingdom">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Ni no Kuni II Revenant Kingdom</h5>
						<p class="card-text">Suite à un putsch, Evan se voit dans l'obligation de recréer un royaume de A à Z .</p>
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
					<img class="card-img-top w-50  mx-auto" src="../../public/image/dbz.jpg" alt="Jaquette du jeu Dragon Ball Z Kakarot ">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Dragon Ball Z Kakarot</h5>
						<p class="card-text">Revivez l'histoire de Dragon Ball Z avec une liberté jamais atteinte jusque là.</p>
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