<?php
require 'vendor/autoload.php';
require 'src/views/elements/header.php';
require 'src/views/elements/footer.php';
require 'src/views/elements/fonctions.php';
require 'src/config/config.php';
require 'src/model/connect.php';

$db = connection();

head();
footer();


// Partie router
$router = new AltoRouter();
require 'src/views/elements/router.php';
$match = $router->match();

if($match['target'] === '/'){
    require 'src/views/home.php';
}
