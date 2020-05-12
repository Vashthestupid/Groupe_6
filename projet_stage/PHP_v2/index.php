<?php
session_start();
require 'vendor/autoload.php';
require 'src/views/elements/header.php';
require 'src/views/elements/footer.php';
require 'src/config/config.php';
require 'src/model//connect.php';


$db = connection();

// Partie connexion

if (isset($_POST['email']) && isset($_POST['mdp'])) {
	$email = htmlspecialchars(trim($_POST['email']));
	$mdp = htmlspecialchars(trim($_POST['mdp']));

	$selectUser = "SELECT mailUser, mdpUser FROM users WHERE mailUser = :mail";

	$reqSelectUser = $db->prepare($selectUser);
	$reqSelectUser->bindParam(':mail', $email);
	$reqSelectUser->execute();

	$data = $reqSelectUser->fetchObject();

    if (password_verify($_POST['mdp'], $data->mdpUser)) {
        if (isset($_SESSION['login'])) {
			$mail = $_SESSION['login'];
        } else {
            $_SESSION['login'] = $_POST['email'];
            $mail = $_SESSION['login'];

            header('Location: /');
        }
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

if($match['target'] === '/'){
	require 'src/views/home.php';
} elseif ($match['target'] === 'Inscription'){
	require 'src/views/connexion.php';
} elseif($match['target'] === 'Livres'){
	require 'src/views/livre.php';
} elseif($match['target'] === 'Films'){
	require 'src/views/film.php';
} elseif($match['target'] === 'Jeux'){
	require 'src/views/jeu.php';
} elseif($match['target'] === 'detailLivre'){
	require 'src/views/detailLivre.php';
} elseif($match['target'] === 'detailFilm'){
	require 'src/views/detailFilm.php';
} elseif($match['target'] === 'detailJeu'){
	require 'src/views/detailJeu.php';
} elseif($match['target'] === 'AjoutLivre'){
	require 'src/views/ajoutLivre.php';
} elseif($match['target'] === 'AjoutFilm'){
	require 'src/views/ajoutFilm.php';
} elseif($match['target'] === 'AjoutJeu'){
	require 'src/views/ajoutJeu.php';
} elseif($match['target'] === 'Panier'){
	require 'src/views/panier.php';
} elseif($match['target'] === 'Deconnexion'){
	require 'src/views/deconnexion.php';
}

footer();
