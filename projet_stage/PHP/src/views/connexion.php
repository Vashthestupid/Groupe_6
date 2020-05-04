<?php
include 'elements/header.php'; 
include 'elements/footer.php';
include 'elements/fonctions.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

// La partie inscription

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emailInsc']) && isset($_POST['mdpInsc']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['pays'])) {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['emailInsc']));
    $mdp = password_hash(htmlspecialchars(trim($_POST['mdp'])), PASSWORD_BCRYPT);
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $ville = htmlspecialchars(trim($_POST['ville']));
    $pays = htmlspecialchars(trim($_POST['pays']));

    // on ajoute d'abord la ville dans la base de données
    // on verifie si la données existe dans la base de données

    $selectVilleExiste = "SELECT COUNT(nomVille) as nbVille FROM ville WHERE nomVille = :nomVille";

    $reqSelectVilleExiste = $db->prepare($select);
    $reqSelectVilleExiste->bindParam(':nomVille', $ville);
    $reqSelectVilleExiste->execute();

    $nb = $reqSelectVilleExiste->fetchObject();

    if ($nb->nb == 0) {
        $insertVille = "INSERT INtO ville(nomVille) VALUES(:ville)";

        $reqInsertVille = $db->prepare($insertVille);
        $reqInsertVille->bindParam(':ville', $ville);
        $reqInsertVille->execute();

        $lastInsertIdVille = $db->lastInsertId();
    }

    // Puis on ajoute le pays
    // on verifie si elle n'existe pas

    $selectPaysExiste = "SELECT COUNT(nomPays) as nbPays FROM pays WHERE nomPays = :nomPays";

    $reqSelectPaysExiste = $db->prepare($selectPaysExiste);
    $reqSelectPaysExiste->bindParam(':nomPays', $pays);
    $reqSelectPaysExiste->execute();

    $nbPays = $reqSelectPaysExiste->fetchObject();

    if ($nbPays->nbPays == 0) {
        $insertPays = "INSERT INTO pays(nomPays) VALUES(:pays)";

        $reqInsertPays = $db->prepare($insertPays);
        $reqInsertPays->bindParam(':pays', $pays);
        $reqInsertPays->execute();

        $lastInsertIdPays = $db->lastInsertId();
    }

    // Puis on ajoute l'utilisateur
    // On verifie s'il n'existe pas

    $selectUserExiste = "SELECT COUNT(mailUser) as nbUser FROM users WHERE mailUser = :mailUser";

    $reqSelectUserExiste = $db->prepare($selectUserExiste);
    $reqSelectUserExiste->bindParam(':mailUser', $email);
    $reqSelectUserExiste->execute();

    $nbUser = $reqSelectUserExiste->fetchObject();

    if ($nbUser->nbUser == 0) {
        $insertUser = "INSERT INTO users(nomUser,prenomUser,mailUser,mdpUser,adresseUser,ville_idville,pays_idPays) VALUES(:nomUser,:prenomUser,:mail,:mdp,:adresse,$lastInsertIdVille,$lastInsertIdPays";

        $reqInsertUser = $db->prepare($insertUser);
        $reqInsertUser->bindParam(':nomUser', $nom);
        $reqInsertUser->bindParam(':prenomUser', $prenom);
        $reqInsertUser->bindParam(':mail', $email);
        $reqInsertUser->bindParam(':mdp', $mdp);
        $reqInsertUser->bindParam(':adresse', $adresse);
        $reqInsertUser->execute();

        echo "<div class='alert alert-success'>Votre formulaire a bien été enregistré</div>";
    } else {
        echo "<div class='alert alert-danger'>L'adresse email est déjà utilisée</div>";
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
		<br>
		<div class="d-flex justify-content-center">
			<button id="btnInscription" type="button" class="btn btn-secondary mr-3">Inscription</button>
			<button id="btnConnexion" type="button" class="btn btn-secondary">Connexion</button>
		</div>
		<br>
        <div id="connexion" class="offset-md-2 col-md-8" >
            <h2 class=" titleForm d-flex justify-content-center">Formulaire de connexion</h2>
            <form action="../../index.html" method="post" id="formConnexion">
                <div class="form-group">
                    <label for="email" class="d-flex justify-content-center">Email</label>
                    <input class="form-inline d-flex mx-auto w-75" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
                    <input class="form-inline d-flex mx-auto w-75" type="password" name="mdp" id="mdp">
                </div>
                <input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
            </form> 
        </div>
		<div id="inscription">
			<h2 class=" titleForm d-flex justify-content-center">Formulaire d'inscription</h2>
			<form method="post" class="offset-md-2 col-md-8">
				<div class="form-group">
					<label for="nom" class="d-flex justify-content-center">Nom</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom">
				</div>
				<div class="form-group">
					<label for="prenom" class="d-flex justify-content-center">Prenom</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="prenom" id="prenom">
				</div>
				<div class="form-group">
					<label for="email" class="d-flex justify-content-center">Email</label>
					<input class="form-inline d-flex mx-auto w-75" type="email" name="emailInsc" id="emailInsc">
				</div>
				<div class="form-group">
					<label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
					<input class="form-inline d-flex mx-auto w-75" type="password" name="mdpInsc" id="mdpInsc">
				</div>
				<div class="form-group">
					<label for="mdp2" class="d-flex justify-content-center">Confirmation du mot de passe </label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="mdp2" id="mdp2">
				</div>
				<div class="form-group">
					<label for="adresse" class="d-flex justify-content-center">Adresse</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse">
				</div>
				<div class="form-group">
					<label for="ville" class="d-flex justify-content-center">Ville</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville">
				</div>
				<div class="form-group">
					<label for="pays" class="d-flex justify-content-center">Pays</label>
					<input class="form-inline d-flex mx-auto w-75" type="text" name="pays" id="pays">
				</div>
				<input type="submit" value="Valider" class="btn btn-success d-flex mx-auto">
			</form>
		</div>
	</div>
<?php
footer();