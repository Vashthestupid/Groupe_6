<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require "vendor/autoload.php";
require "src/views/elements/header.php";
require "src/views/elements/footer.php";
require "src/views/elements/fonctions.php";
require "src/config/config.php";
require "src/model/connect.php";

//Connexion à la base de données 
$db = connection();

// Partie création de session
// Si les champs envoyés existent
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = htmlspecialchars(trim($_POST['mail']));
    $mdp = htmlspecialchars(trim($_POST['mdp']));

    // on selectionne toutes les données de la table "users" où l'adresse email est égal à la valeur du champ "mail" envoyé
    $selectUser = "SELECT * FROM users WHERE users.mailUser = :mail ";

    $reqSelectUser = $db->prepare($selectUser);
    $reqSelectUser->bindParam(':mail', $mail);
    $reqSelectUser->execute();

    // On récupère les information pour les utiliser dans des variables de session
    $data = $reqSelectUser->fetchObject();
    $_SESSION['prenom'] = $data->prenomUser;
    $_SESSION['idUser'] = $data->idUser;

    // On verifie si le mot de passe est bien celui de l'utilisateur
    if (password_verify($_POST['mdp'], $data->mdpUser)) {
        if (isset($_SESSION['login'])) {
            $email = $_SESSION['login'];
        } else {
            $_SESSION['login'] = $_POST['mail'];
            $email = $_SESSION['login'];

            header('Location: /');
        }
    }

    if (isset($_SESSION['login'])) {
        $email = $_SESSION['login'];
    } else {
        $email = "";
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
} elseif ($match['target'] === 'Jeux') {
    require "src/views/info.php";
} elseif ($match['target'] === 'Ma_Page') {
    require "src/views/mapage.php";
} 
// Application du footer
footer();
