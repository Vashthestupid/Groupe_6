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
        <div class="row">
            <div class="image d-flex justify-content-center col-sm-12 col-md-7">
                <img class="w-50" src="../../public/image/ff7.jpg" alt="Jaquette FF7 Remake">
            </div>
            <div class="titre&description col-sm-12 col-md-5">
                <div class="titre col-sm-12 col-md-12">
                    <p class="d-flex mt-2 justify-content-center">Final Fantasy VII Remake</p>
                </div>
                <div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
                    <p class="d-flex justify-content-center">Description</p>
                    <p>Studio de développement: Square Enix</p>
                    <p>Genre: Action RPG</p>
                    <p>1 joueur</p>
                    <p>Pas de multijoueur</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-5 col-sm-12 offset-md-3 col-md-6">
				<div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
               		<p class="d-flex justify-content-center">Résumé</p>
                	<p>La lutte du groupe Avalanche mené par Barett contre la Shinra qui pompe l'energie de la planète sans penser aux conséquences.</p>
				</div>
			</div>
			<div class="mt-5 col-sm-12 col-md-12">
				<div class="col-sm-12 col-md-12">
					<table class="table border border-secondary bg-white rounded">
						<thead class="thead-light">
							<tr>
								<th>Loïc</th>
								<th>19/11/2020</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="2">Superbe jeu qui je trouve reste quand même relativement long. En effet, la fin n'est pas des plus intéressante en terme de gameplay malgrès la multitude de boss (peut être un peu trops) avec une mise en scène dantesque.</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-12">
					<form method="post">
						<div class="form-group">
							<label class="lead d-flex justify-content-center" for="ajout">Ajouter un commentaire</label>
							<textarea class=" mt-4 d-flex mx-auto" name="commentaire" id="commentaire" cols="40" rows="10" placeholder="Ajouter un commentaire"></textarea>
						</div>
						<input class="btn btn-success d-flex mx-auto" type="submit" value="Valider l'ajout du commentaire">
					</form>
				</div>
			</div>
			
			<button class="mt-5 mx-auto btn btn-secondary" type="button">Ajouter au panier</button>
        </div>
	</div>
<?php
footer();