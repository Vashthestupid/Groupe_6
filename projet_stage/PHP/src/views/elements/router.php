<?php

$router->map('GET','/','/', 'Home');
$router->map('GET|POST','/Inscription','Inscription', 'Inscription');
$router->map('GET|POST', '/Livre','Livre','Livre');
$router->map('GET|POST', '/Film','Film','Film');
$router->map('GET|POST', '/Jeux','Jeux','Jeux');
$router->map('GET|POST','/detailLivre/[i:id]', 'detailLivre');
$router->map('GET|POST','/detailFilm/[i:id]', 'detailFilm');
$router->map('GET|POST','/detailJeu/[i:id]', 'detailJeu');
$router->map('GET|POST','/AjoutLivre', 'AjoutLivre');
$router->map('GET|POST','/AjoutFilm', 'AjoutFilm');
$router->map('GET|POST','/AjoutJeu', 'AjoutJeu');
$router->map('GET','/Panier', 'Panier');