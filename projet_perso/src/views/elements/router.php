<?php

$router->map('GET|POST', '/', '/', 'Home');
$router->map('GET|POST', '/Inscription', 'Inscription', 'Inscription');
$router->map('GET|POST', '/Connexion', 'Connexion', 'Connexion');
$router->map('GET|POST', '/Deconnexion', 'Deconnexion', 'Deconnexion');
$router->map('GET|POST', '/Ajouter_un_jeu', 'Ajouter_un_jeu', 'Ajouter_un_jeu');
$router->map('GET|POST', '/Detail_du_jeu', 'Detail_du_jeu', 'Detail_du_jeu');
$router->map('GET|POST', '/Ma_Page', 'Ma_Page', 'Ma_Page');
$router->map('GET', '/Modifier_Jeu', 'Modifier_Jeu', 'Modifier_Jeu');
$router->map('GET', '/Modifier_Utilisateur', 'Modifier_Utilisateur', 'Modifier_Utilisateur');
$router->map('GET|POST', '/Recherche', 'Recherche', 'Recherche');
