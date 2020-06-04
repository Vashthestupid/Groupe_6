<?php

function head()
{
    
?>
    <!doctype html>
    <html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- lien de la police d'ecriture "Press Start 2P" -->
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <!-- Lien vers fichier css -->
        <link rel="stylesheet" href="public/sass/main.css">
        <title>JeuxAVendre</title>
    </head>

    <body>
        <!-- NavBar bootstrap avec formulaire de recherche -->
        <nav class="navbar navbar-expand-lg text-light">
            <a class="navbar-brand text-light" href="/">JeuxAVendre</a>
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (!$_SESSION['login']) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Inscription">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Connexion">Connexion</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Deconnexion">Deconnexion</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['login']) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Ajouter_un_jeu">Ajouter un jeu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Ma_page">Ma page</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Consoles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdow-divider bg-secondary text-light d-flex justify-content-center">Nintendo</div>
                            <a class="dropdown-item" href="Nintendo_64">Nintendo 64</a>
                            <a class="dropdown-item" href="GameCube">GameCube</a>
                            <a class="dropdown-item" href="Wii">Wii</a>
                            <a class="dropdown-item" href="WiiU">WiiU</a>
                            <a class="dropdown-item" href="GameCube">GameCube</a>
                            <div class="dropdow-divider bg-secondary text-light d-flex justify-content-center">SEGA</div>
                            <a class="dropdown-item" href="Master_System">Master System</a>
                            <a class="dropdown-item" href="MegaDrive">MegaDriv</a>
                            <a class="dropdown-item" href="Saturn">Saturn</a>
                            <a class="dropdown-item" href="DreamCast">DreamCast</a>
                            <div class="dropdow-divider bg-secondary text-light d-flex justify-content-center">Sony</div>
                            <a class="dropdown-item" href="Playstation">Playstation</a>
                            <a class="dropdown-item" href="Playstation_2">Playstation 2</a>
                            <a class="dropdown-item" href="Playstation_3">Playstation 3</a>
                            <a class="dropdown-item" href="Playstation_4">Playstation 4 </a>
                            <a class="dropdown-item" href="PSP">PSP</a>
                            <div class="dropdow-divider bg-secondary text-light d-flex justify-content-center">Microsoft/PC</div>
                            <a class="dropdown-item" href="Xbox">Xbox</a>
                            <a class="dropdown-item" href="Xbox_360">Xbox 360</a>
                            <a class="dropdown-item" href="Xbox_One">Xbox One</a>
                            <a class="dropdown-item" href="PC">PC</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <?php
}
