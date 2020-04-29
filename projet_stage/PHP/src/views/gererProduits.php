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
					<a class="dropdown-item d-flex justify-content-center bg-secondary text-white" href="ajoutLivre.php">Ajouter un livre</a>
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

    <div class="container">
        <h2 class="titleForm mt-4 d-flex justify-content-center">Liste des produits</h2>
        <div class="row">
            <div id="produits" class=" mt-5 d-flex mx-auto">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nom du produit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Final Fantasy VII Remake</td>
                            <td>
                                <div class="col-sm-12 col-md-12">
                                    <form class="mt-2" action="detail.html" method="get">
                                        <input type="number" name="id" id="id" value="id" hidden>
                                        <input type="text" name="action" id="action" value="lire" hidden>
                                        <input class="btn btn-primary" type="submit" value="Lire">
                                    </form>
                                    <form class="mt-2" action="modifierProduit.html" method="get">
                                        <input type="number" name="id" id="id" value="id" hidden>
                                        <input type="text" name="action" id="action" value="modifier" hidden>
                                        <input class=" btn btn-warning" type="submit" value="Modifier">
                                    </form>
                                    <form class="mt-2" method="get">
                                        <input type="number" name="id" id="id" value="id" hidden>
                                        <input type="text" name="action" id="action" value="supprimer" hidden>
                                        <input class="btn btn-danger" type="submit" value="Supprimer">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
footer();