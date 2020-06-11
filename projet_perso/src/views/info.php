<?php

$infoProduit = new Jeux($db);
$infoProduit->setId($_GET['id']);
$infosJeux = $infoProduit->selectJeu();
//var_dump($infosJeux);
?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5">Detail du jeu</h3>
    <?php
    foreach ($infosJeux as $infoJeu) {
    ?>
        <div class="row">
            <div class="col-sm-12 offset-md-2 col-md-4 mt-3">
                <img class=" imageDetail mx-auto d-flex justify-content-center" src="public/image/<?= $infoJeu['imageJeu'] ?>" alt="image <?= $infoJeu['titreJeu'] ?>">
                <h4 class=" titreJeu mt-2 d-flex justify-content-center w-100"><?= $infoJeu['titreJeu'] ?> <?= strtolower($infoJeu['consoleJeu']) ?></h4>
            </div>
            <div class="col-sm-12 offset-md-1 col-md-5 mt-3">
                <div id="informations">
                    <!-- Si la personne n'est pas connectée alors elle ne pourra pas cliquer sur le lien  -->
                    <?php
                    if (!$_SESSION['login']) {
                    ?>
                        <small>Connectez vous pour accéder à la page du revendeur :)</small>
                        <p>Possesseur: <?= $infoJeu['prenomUser'] ?> <?= $infoJeu['nomUser'] ?></p>
                    <?php
                    } else {
                    ?>
                        <p>Possesseur:<a name="lien" href="<?= $router->generate('Ma_Page') ?>?nom=<?= $infoJeu['nomUser'] ?>&prenom=<?= $infoJeu['prenomUser'] ?>"><?= $infoJeu['prenomUser'] ?> <?= $infoJeu['nomUser'] ?></a></p>
                    <?php
                    }
                    ?>
                    <p>Prix demandé: <?= $infoJeu['prixJeu'] ?>€</p>
                    <p>Commentaire de <strong><?= $infoJeu['prenomUser'] ?></strong>: <?= $infoJeu['commentaireJeu'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>