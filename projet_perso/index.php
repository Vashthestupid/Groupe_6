<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();
require "vendor/autoload.php";
require "src/views/elements/header.php";
require "src/views/elements/footer.php";
require "src/views/elements/fonctions.php";
require "src/config/config.php";
require "src/config/connect.php";

//Connexion à la base de données 
$db = connection();

use App\Model\Users;

$conn = new Users($db);

// Partie création de session
// Si les champs envoyés existent
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $conn->setMail($_POST['mail']);
    $req = $conn->connexion();
    $mailUser = $req->mailUser;
    $_SESSION['prenom'] = $req->prenomUser;
    $_SESSION['nom'] = $req->nomUser;
    $_SESSION['idUser'] = $req->id;

    $passwordValid = password_verify($_POST['mdp'], $req->mdpUser);

    if (!$passwordValid) {
        header('Location: /?erreur=Identifiant ou mot de passe incorrect');
    } else {
        $_SESSION['login'] = $mailUser;
        header('Location: /');
    }
}


//Application du header
head();
// Partie router
$router = new AltoRouter();
require "src/views/elements/router.php";

$match = $router->match();

if ($match['target'] === '/') {
    require "src/views/home.php";
} elseif ($match['target'] === 'Inscription') {
    require "src/views/inscription.php";
} elseif ($match['target'] === 'Connexion') {
    require "src/views/connexion.php";
} elseif ($match['target'] === 'Deconnexion') {
    require "src/views/deconnexion.php";
} elseif ($match['target'] === 'Ajouter_un_jeu') {
    require "src/views/ajout.php";
} elseif ($match['target'] === 'Detail_du_jeu') {
    require "src/views/info.php";
} elseif ($match['target'] === 'Ma_Page') {
    require "src/views/user.php";
} elseif ($match['target'] === 'Modifier_Jeu'){
    require "src/views/updateJeu.php";
} elseif ($match['target'] === 'Modifier_Utilisateur'){
    require "src/views/updateUser.php";
} elseif ($match['target'] === 'Recherche'){
    require "src/views/recherche.php";
}

// Application du footer
footer();

// Log
use App\Log\Logger;

$file = fopen('log.txt', 'a+');
$logger = new Logger($file);
$logger->setPrenom($_SESSION['prenom']);
$logger->write();
fclose($file);
