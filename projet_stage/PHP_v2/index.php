<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'vendor/autoload.php';
require 'src/views/elements/header.php';
require 'src/views/elements/footer.php';
require 'src/config/config.php';
require 'src/model/connect.php';


$db = connection();

// Partie connexion de l'administrateur ou de l'utilisateur
if (isset($_POST['email']) && isset($_POST['mdp'])) {
	$email = htmlspecialchars(trim($_POST['email']));
	$mdp = htmlspecialchars(trim($_POST['mdp']));

	$selectUser = "SELECT * FROM users WHERE mailUser = :mail";

	$reqSelectUser = $db->prepare($selectUser);
	$reqSelectUser->bindParam(':mail', $email);
	$reqSelectUser->execute();

	// Je récupère les informations présentes dans la base de données pour les utiliser plus tard 
	$data = $reqSelectUser->fetchObject();
	$_SESSION['prenom'] = $data->prenomUser;
	$_SESSION['role'] = $data->user_type;
	$_SESSION['user'] = $data->idUser;

	if (password_verify($_POST['mdp'], $data->mdpUser)) {
		if (isset($_SESSION['login'])) {
			$mail = $_SESSION['login'];
		} else {
			$_SESSION['login'] = $_POST['email'];
			$mail = $_SESSION['login'];

			header('Location: /');
		}
	} else {
		echo '<div class="alert alert-danger">Identifiant ou mot de passe incorrect</div>';
	}

	if (isset($_SESSION['login'])) {
		$mail = $_SESSION['login'];
	} else {
		$mail = '';
	}
}

head();
// Partie Router
$router = new AltoRouter();
include 'src/views/elements/router.php';

$match = $router->match();

if ($match['target'] === '/') {
	require 'src/views/home.php';
} elseif ($match['target'] === 'Inscription') {
	require 'src/views/connexion.php';
} elseif ($match['target'] === 'Livres') {
	require 'src/views/livre.php';
} elseif ($match['target'] === 'Films') {
	require 'src/views/film.php';
} elseif ($match['target'] === 'Jeux') {
	require 'src/views/jeu.php';
} elseif ($match['target'] === 'detailLivre') {
	require 'src/views/detailLivre.php';
} elseif ($match['target'] === "modifierLivre") {
	require 'src/views/modifierLivre.php';
} elseif ($match['target'] === "supprimerLivre") {
	require 'src/views/supprimerLivre.php';
} elseif ($match['target'] === 'detailFilm') {
	require 'src/views/detailFilm.php';
} elseif ($match['target'] === "modifierFilm") {
	require 'src/views/modifierFilm.php';
} elseif ($match['target'] === "supprimerFilm") {
	require 'src/views/supprimerFilm.php';
} elseif ($match['target'] === 'detailJeu') {
	require 'src/views/detailJeu.php';
} elseif ($match['target'] === 'modifierJeu') {
	require "src/views/modifierJeu.php";
} elseif ($match['target'] === 'supprimerJeu') {
	require "src/views/supprimerJeu.php";
} elseif ($match['target'] === 'AjoutLivre') {
	require 'src/views/ajoutLivre.php';
} elseif ($match['target'] === 'AjoutFilm') {
	require 'src/views/ajoutFilm.php';
} elseif ($match['target'] === 'AjoutJeu') {
	require 'src/views/ajoutJeu.php';
} elseif ($match['target'] === 'Panier') {
	require 'src/views/panier.php';
} elseif ($match['target'] === 'Deconnexion') {
	require 'src/views/deconnexion.php';
} elseif ($match['target'] === 'Recherche') {
	require "src/views/recherche.php";
} elseif ($match['target'] === 'Recapitulatif') {
	require "src/views/recap.php";
} elseif($match['target'] === "Supprimer_du_panier"){
	require "src/views/supprimerPanier.php";
}

footer();
