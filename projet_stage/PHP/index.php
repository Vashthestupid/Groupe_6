<?php
include 'src/views/elements/header.php';

head();
?>
	
	<nav class="navbar navbar-expand-xl navbar-light bg-light">
		<a class="navbar-brand" href="#">DivertiBuy</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
			<a class="nav-link" href="src/views/connexion.html">Inscription/Connexion</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/livre.html">Livres</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/film.html">Film</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="src/views/jeu.html">Jeux Video</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Ajouter un produit
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutLivre.html">Ajouter un livre</a>
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutFilm.html">Ajouter un film</a>
					<a class="dropdown-item d-flex justify-content-center" href="src/views/ajoutJeu.html">Ajouter un Jeu</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="src/views/panier.html">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="src/views/gererProduits.html">Gérer les produits</a>
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
		<p class="d-flex justify-content-center lead">Voici les 6 derniers produits ajoutés</p>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="public/image/le_morte_d_arthur.jpg" alt="Image livre le morte d'arthur">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Le morte d'Arthur</h5>
						<p class="card-text">Superbe roman narrant les innombrables aventures du roi arthur et de ses chevaliers jusqu'a son tragique décès.</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>					
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="public/image/joker.jpg" alt="Affiche du film 'JOKER'">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">JOKER</h5>
						<p class="card-text">Film absolument génial que je n'ai pas vu.</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>					
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="public/image/ff7.jpg" alt="jaquette final Fantasy 7 remake">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Final Fantasy VII Remake</h5>
						<p class="card-text">Magnifique jeu qui n'est pas juste un remake mais une réinterprétation du jeu originel de 1997</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>					
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="public/image/harryPotter.jpg" alt="coffret intégral harry potter">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Coffret intégral Harry Potter</h5>
						<p class="card-text">Coffret qui réuni l'intégralité des films Harry Potter</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>					
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50  mx-auto" src="public/image/ZeldaOOT3D.png" alt="jaquette Zelda Ocarina Of time 3D">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Zelda Ocarine Of Time 3D</h5>
						<p class="card-text">Remake 3D du jeu Zelda le plus connu et le plus adulé par les fans de la license.</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img class="card-img-top w-50 h-50 mx-auto" src="public/image/silmarillon.jpg" alt="Photo du livre le Silmarillion">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center">Le Silmarillion</h5>
						<p class="card-text">Roman narrant la création de l'univers, la naissance des premiers hommes ainsi que la lutte contre l'infâme Melkor et son serviteur Sauron.</p>
					</div>
					<div class="card-footer">
						<form action="src/views/detail.html" method="get">
							<input type="number" name="id" id="id" value="" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="public/js/main.js"></script>
	</body>
</html>