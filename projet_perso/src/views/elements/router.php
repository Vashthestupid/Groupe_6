<?php

$router->map('GET|POST', '/', '/', 'Home');
$router->map('GET|POST', '/Inscription', 'Inscription', 'Inscription');
$router->map('GET|POST', '/Connexion', 'Connexion', 'Connexion');
$router->map('GET|POST', '/Deconnexion', 'Deconnexion', 'Deconnexion');
$router->map('GET|POST', '/Ajouter_un_jeu', 'Ajouter_un_jeu', 'Ajouter_un_jeu');
$router->map('GET|POST', '/Jeux', 'Jeux', 'Jeux');
$router->map('GET|POST', '/Ma_Page', 'Ma_Page', 'Ma_Page');
