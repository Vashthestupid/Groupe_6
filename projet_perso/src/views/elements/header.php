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
                            <a class="nav-link" href="Ma_Page">Ma page</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form action="Recherche" method="post" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="recherche">
                    <button class="btn btn-success btn-outline-light my-2 my-sm-0" name="search" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <?php
}
