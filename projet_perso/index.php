<?php

require "vendor/autoload.php";
require "src/views/elements/header.php";
require "src/views/elements/footer.php";
require "src/config/config.php";
require "src/model/connect.php";

//Connexion à la base de données 
$db = connection();

//Application du header et du footer
head();
footer();

// Partie router
$router = new AltoRouter();
require "src/views/elements/router.php";

$match = $router->match();

if($match['target'] === '/'){
    require "src/views/home.php";
} elseif($match['target'] === 'Inscription'){
    require "src/views/inscription.php";
}