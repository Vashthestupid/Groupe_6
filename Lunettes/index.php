<?php

error_reporting(E_ALL & ~E_NOTICE);
session_start();


require 'vendor/autoload.php';
require 'src/views/elements/header.php';
require 'src/views/elements/footer.php';
require 'src/config/config.php';
require 'src/model/connect.php';

$db = connection();

head();

// Connexion

// Partie connexion de l'administrateur ou de l'utilisateur

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $mdp = htmlspecialchars(trim($_POST['mdp']));

    $selectUser = "SELECT * FROM user WHERE mailUser = :mail";

    $reqSelectUser = $db->prepare($selectUser);
    $reqSelectUser->bindParam(':mail', $email);
    $reqSelectUser->execute();

    // Je récupère les informations présentes dans la base de données pour les utiliser plus tard 
    $data = $reqSelectUser->fetchObject();
    $_SESSION['prenom'] = $data->prenomUser;
    $_SESSION['nom'] = $data->nomUser;
    $_SESSION['role'] = $data->type_user_idType;
    $_SESSION['user'] = $data->id;

    $passwordValid = password_verify($mdp, $data->mdpUser);

    if ($passwordValid) {

        if (isset($_SESSION['login'])) {
            $mail = $_SESSION['login'];
        } else {
            $_SESSION['login'] = $_POST['email'];
            $mail = $_SESSION['login'];

            // header('Location: /');
            echo '<meta http-equiv="refresh" content="0; url=/"/>';
        }
    } else {
        // header('location: /?erreur= Identifiant ou mot de passe invalide');
        echo '<meta http-equiv="refresh" content="0;/?erreur=Identifiant ou mot de passe invalide"/>';
    }

    if (isset($_SESSION['login'])) {
        $mail = $_SESSION['login'];
    } else {
        $mail = '';
    }
}




// Partie Router
$router = new AltoRouter();

$router->map('GET|POST', '/', '/', 'Home');
$router->map('GET|POST', '/femme', 'femme', 'femme');
$router->map('GET|POST', '/homme', 'homme', 'homme');
$router->map('GET|POST', '/inscription', 'inscription', 'inscription');
$router->map('GET|POST', '/deconnexion', 'deconnexion', 'deconnexion');
$router->map('GET|POST', '/showProduit', 'showProduit', 'showProduit');
$router->map('GET|POST', '/lunettes', 'lunettes', 'lunettes');
$router->map('GET|POST', '/panier', 'panier', 'panier');
$router->map('GET|POST', '/monCompte', 'monCompte', 'monCompte');
$router->map('GET|POST', '/modifierInfo', 'modifierInfo', 'modifierInfo');
$router->map('GET|POST', '/supprimerCommande', 'supprimerCommande', 'supprimerCommande');
//Partie router typeUser
$router->map('GET|POST', '/admin/typeUser', 'typeUser', 'typeUser');
$router->map('GET|POST', '/admin/typeUser/newTypeUser', 'newTypeUser', 'newTypeUser');
$router->map('GET|POST', '/admin/typeUser/showTypeUser', 'showTypeUser', 'showTypeUser');
$router->map('GET|POST', '/admin/typeUser/editTypeUser', 'editTypeUser', 'editTypeUser');
$router->map('GET|POST', '/admin/typeUser/deleteTypeUser', 'deleteTypeUser', 'deleteTypeUser');
// Partie User
$router->map('GET|POST', '/admin/user', 'user', 'user');
$router->map('GET|POST', '/admin/user/showUser', 'showUser', 'showUser');
$router->map('GET|POST', '/admin/user/editUser', 'editUser', 'editUser');
$router->map('GET|POST', '/admin/user/deleteUser', 'deleteUser', 'deleteUser');
//Partie Status
$router->map('GET|POST', '/admin/status', 'status', 'status');
$router->map('GET|POST', '/admin/status/newStatus', 'newStatus', 'newStatus');
$router->map('GET|POST', '/admin/status/showStatus', 'showStatus', 'showStatus');
$router->map('GET|POST', '/admin/status/editStatus', 'editStatus', 'editStatus');
$router->map('GET|POST', '/admin/status/deleteStatus', 'deleteStatus', 'deleteStatus');
//Partie Type
$router->map('GET|POST', '/admin/type', 'type', 'type');
$router->map('GET|POST', '/admin/type/newType', 'newType', 'newType');
$router->map('GET|POST', '/admin/type/showType', 'showType', 'showType');
$router->map('GET|POST', '/admin/type/editType', 'editType', 'editType');
$router->map('GET|POST', '/admin/type/deleteType', 'deleteType', 'deleteType');
//Partie Produits
$router->map('GET|POST', '/admin/produits', 'produits', 'produits');
$router->map('GET|POST', '/admin/produits/newProduit', 'newProduit', 'newProduit');
$router->map('GET|POST', '/admin/produits/editProduit', 'editProduit', 'editProduit');
$router->map('GET|POST', '/admin/produits/deleteProduit', 'deleteProduit', 'deleteProduit');
//Partie Commandes
$router->map('GET|POST', '/admin/commandes', 'commandes', 'commandes');
$router->map('GET|POST', '/admin/commandes/showCommande', 'showCommande', 'showCommande');
$router->map('GET|POST', '/admin/commandes/editCommande', 'editCommande', 'editCommande');


$match = $router->match();

if ($match['target'] === '/') {
    require 'src/views/home.php';
} elseif ($match['target'] === 'femme') {
    require 'src/views/femme.php';
} elseif ($match['target'] === 'homme') {
    require 'src/views/homme.php';
} elseif ($match['target'] === 'inscription') {
    require 'src/views/inscription.php';
} elseif ($match['target'] === 'deconnexion') {
    require 'src/views/deconnexion.php';
} elseif ($match['target'] == 'showProduit') {
    require 'src/views/show_produits.php';
} elseif ($match['target'] == 'lunettes') {
    require 'src/views/lunettes.php';
} elseif ($match['target'] == 'panier') {
    require 'src/views/panier.php';
} elseif ($match['target'] == 'monCompte') {
    require 'src/views/monCompte.php';
} elseif ($match['target'] == 'modifierInfo') {
    require 'src/views/modifierInfo.php';
} elseif ($match['target'] == 'supprimerCommande') {
    require 'src/views/supprimerCommande.php';
    // Partie typeUser
} elseif ($match['target'] === 'typeUser') {
    require 'src/views/admin/typeUser/index_typeUser.php';
} elseif ($match['target'] === 'newTypeUser') {
    require 'src/views/admin/typeUser/new_typeUser.php';
} elseif ($match['target'] === 'showTypeUser') {
    require 'src/views/admin/typeUser/show_typeUser.php';
} elseif ($match['target'] === 'editTypeUser') {
    require 'src/views/admin/typeUser/edit_typeUser.php';
} elseif ($match['target'] === 'deleteTypeUser') {
    require 'src/views/admin/typeUser/delete_typeUser.php';
    //Partie User
} elseif ($match['target'] === 'user') {
    require 'src/views/admin/user/index_user.php';
} elseif ($match['target'] === 'showUser') {
    require 'src/views/admin/user/show_user.php';
} elseif ($match['target'] === 'editUser') {
    require 'src/views/admin/user/edit_user.php';
} elseif ($match['target'] === 'deleteUser') {
    require 'src/views/admin/user/delete_user.php';
    //Partie Status
} elseif ($match['target'] === 'status') {
    require 'src/views/admin/status/index_status.php';
} elseif ($match['target'] === 'newStatus') {
    require 'src/views/admin/status/new_status.php';
} elseif ($match['target'] === 'showStatus') {
    require 'src/views/admin/status/show_status.php';
} elseif ($match['target'] === 'editStatus') {
    require 'src/views/admin/status/edit_status.php';
} elseif ($match['target'] === 'deleteStatus') {
    require 'src/views/admin/status/delete_status.php';
    //Partie Type
} elseif ($match['target'] == 'type') {
    require 'src/views/admin/type/index_type.php';
} elseif ($match['target'] == 'newType') {
    require 'src/views/admin/type/new_type.php';
} elseif ($match['target'] == 'showType') {
    require 'src/views/admin/type/show_type.php';
} elseif ($match['target'] == 'editType') {
    require 'src/views/admin/type/edit_type.php';
} elseif ($match['target'] == 'deleteType') {
    require 'src/views/admin/type/delete_type.php';
    // Partie Produits
} elseif ($match['target'] == 'produits') {
    require 'src/views/admin/produits/index_produits.php';
} elseif ($match['target'] == 'newProduit') {
    require 'src/views/admin/produits/new_produits.php';
} elseif ($match['target'] == 'editProduit') {
    require 'src/views/admin/produits/edit_produits.php';
} elseif ($match['target'] == 'deleteProduit') {
    require 'src/views/admin/produits/delete_produits.php';
    // Partie Commandes
} elseif ($match['target'] == 'commandes') {
    require 'src/views/admin/commandes/index_commandes.php';
} elseif ($match['target'] == 'showCommande') {
    require 'src/views/admin/commandes/show_commandes.php';
} elseif ($match['target'] == 'editCommande') {
    require 'src/views/admin/commandes/edit_commandes.php';
}

footer();
