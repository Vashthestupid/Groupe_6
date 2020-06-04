<?php

$router->map('GET', '/', '/', 'Home');
$router->map('GET|POST', '/Inscription', 'Inscription', 'Inscription');
$router->map('GET|POST', '/Connexion', 'Connexion', 'Connexion');
$router->map('GET', '/Deconnexion', 'Deconnexion', 'Deconnexion');
$router->map('GET|POST', '/Ajouter_un_jeu', 'Ajouter_un_jeu', 'Ajouter_un_jeu');