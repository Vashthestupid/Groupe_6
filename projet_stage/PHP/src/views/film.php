<!doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../../public/css/main.css">
	<title>DivertiBuy</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="../../index.html">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="connexion.html">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="livre.html">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="film.html">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="jeu.html">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="ajoutLivre.html">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutFilm.html">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center" href="ajoutJeu.html">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="panier.html">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="gererProduits.html">Gérer les produits</a>
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
		<p class="d-flex justify-content-center lead">Liste des films </p>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/joker.jpg" alt="Affiche du film Joker">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">JOKER</h5>
						<p class="card-text">Film absolument génial que je n'ai pas vu.</p>
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
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/HPIntegrale.png" alt="Photo du coffret dvd Harry Potter ">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Coffret DVD Harry Potter</h5>
						<p class="card-text">Intégrale des aventures d'Harry Potter contre Voldemort.</p>
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
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/fightClub.jpg" alt="Affiche du film Fight Club">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Fight Club</h5>
						<p class="card-text">Super film.</p>
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
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/tunetueraspoint.jpg" alt="Affiche du film Tu ne tueras point">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Tu ne tueras point</h5>
						<p class="card-text">Meilleur film de Mel Gibson avec en tête d'affiche Andrew Garfield</p>
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
					<img class="card-img-top w-50 h-50 mx-auto" src="../../public/image/Pulp_Fiction.jpg" alt="Affiche du film Pulp Fiction">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Pulp Fiction</h5>
						<p class="card-text">Un incontournable des films de Quentin Tarantino avec à l'affiche Samuel L Jackson, John Travoltat et Bruce Willis.</p>
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
					<img class="card-img-top w-50  mx-auto" src="../../public/image/LSDA.jpg" alt="Affiche du film le seigneur des anneaux : le retour du roi ">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Le seigneur des anneaux: le retour du roi</h5>
						<p class="card-text">Ultime episode de la lutte contre le seigneur du mal Sauron</p>
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



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="../../public/js/main.js"></script>
	</body>
</html>