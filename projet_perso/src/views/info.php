<?php

use App\Model\Jeux;

$infosJeu = new Jeux($db);
$infosJeu->setId($_GET['id']);
$infosJeux = $infosJeu->selectJeu();

?>
<div class="container">
    <h1 class="d-flex justify-content-center mt-5">Detail du jeu</h1>
    <?php
    foreach ($infosJeux as $infoJeu) {
    ?>
        <div class="row mt-5">
            <div class="col-sm-12 offset-md-2 col-md-4 mt-3">
                <img class=" imageDetail mx-auto d-flex justify-content-center" src="public/image/<?= $infoJeu['imageJeu'] ?>" alt="image <?= $infoJeu['titreJeu'] ?>">
                <h4 class=" titreJeu mt-2 d-flex justify-content-center w-100 mt-3"><?= $infoJeu['titreJeu'] ?></h4>
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
                        if ($_SESSION['prenom'] === $infoJeu['prenomUser'] && $_SESSION['nom'] === $infoJeu['nomUser']) {
                        ?>
                            <p>Posssesseur: <a href="Ma_Page"><?= $infoJeu['prenomUser'] . ' ' . $infoJeu['nomUser'] ?></a>
                            <?php
                        } else {
                            ?>
                                <p>Possesseur:<a href="<?= $router->generate('Ma_Page') ?>?nom=<?= $infoJeu['nomUser'] ?>&prenom=<?= $infoJeu['prenomUser'] ?>"> <?= $infoJeu['prenomUser'] . ' ' . $infoJeu['nomUser'] ?></a></p>
                        <?php
                        }
                    }
                        ?>
                        <p>Console: <?= $infoJeu['consoleJeu']?></p>
                        <p>Prix demandé: <?= $infoJeu['prixJeu'] ?>€</p>
                        <p>Commentaire de <strong><?= $infoJeu['prenomUser'] ?></strong>: <?= $infoJeu['commentaireJeu'] ?></p>
                        <p>Ajouté le <?= $infoJeu['dateAjout'] ?> </p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>