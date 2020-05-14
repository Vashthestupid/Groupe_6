<?php

$router->map('GET', '/', '/', 'Home');
$router->map('GET|POST', '/Inscription', 'Inscription', 'Inscription');
$router->map('GET|POST', '/Livres', 'Livres', 'Livres');
$router->map('GET|POST', '/Films', 'Films', 'Films');
$router->map('GET|POST', '/Jeux', 'Jeux', 'Jeux');
$router->map('GET|POST', '/detailLivre', 'detailLivre', 'detailLivre');
$router->map('GET|POST', '/detailLivre/[i:id]', 'detailLivre#id', 'detailLivre#id');
$router->map('GET|POST', '/modifierLivre', 'modifierLivre', 'modifierLivre');
$router->map('GET|POST', '/modifierLivre/[i:id]', 'modifierLivre#id', 'modifierLivre#id');
$router->map('GET|POST', '/supprimerLivre', 'supprimerLivre', 'supprimerLivre');
$router->map('GET|POST', '/supprimerLivre/[i:id]', 'supprimerLivre#id', 'supprimerLivre#id');
$router->map('GET|POST', '/detailFilm', 'detailFilm', 'detailFilm');
$router->map('GET|POST', '/detailFilm/[i:id]', 'detailFilm#id', 'detailFilm#id');
$router->map('GET|POST', '/modifierFilm', 'modifierFilm', 'modifierFilm');
$router->map('GET|POST', '/modifierFilm/[i:id]', 'modifierFilm#id', 'modifierFilm#id');
$router->map('GET|POST', '/supprimerFilm', 'supprimerFilm', 'supprimerFilm');
$router->map('GET|POST', '/supprimerFilm/[i:id]', 'supprimerFilm#id', 'supprimerFilm#id');
$router->map('GET|POST', '/detailJeu', 'detailJeu', 'detailJeu');
$router->map('GET|POST', '/detailJeu/[i:id]', 'detailJeu#id', 'detailJeu#id');
$router->map('GET|POST', '/modifierJeu', 'modifierJeu', 'modifierJeu');
$router->map('GET|POST', '/modifierJeu/[i:id]', 'modifierJeu#id', 'modifierJeu#id');
$router->map('GET|POST', '/supprimerJeu', 'supprimerJeu', 'supprimerJeu');
$router->map('GET|POST', '/supprimerJeu/[i:id]', 'supprimerJeu#id', 'supprimerJeu#id');
$router->map('GET|POST', '/AjoutLivre', 'AjoutLivre', 'AjoutLivre');
$router->map('GET|POST', '/AjoutFilm', 'AjoutFilm' , 'AjoutFilm');
$router->map('GET|POST', '/AjoutJeu', 'AjoutJeu' , 'AjoutJeu');
$router->map('GET', '/Panier', 'Panier', 'Panier');
$router->map('GET', '/Panier/[i:id]', 'Panier#id', 'Panier#id');
$router->map('GET', '/Deconnexion', 'Deconnexion', 'Deconnexion');
$router->map('GET|POST', '/Recherche', 'Recherche', 'Recherche');

