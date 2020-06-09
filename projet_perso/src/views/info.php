<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // On va récupérer toutes les informations du jeu 
    $selectInfoJeu = "SELECT 
    titreJeu,
    consoleJeu,
    prixJeu,
    imageJeu,
    commentaireJeu,
    dateAjout,
    users.prenomUser,
    users.nomUser
    FROM jeux 
    INNER JOIN users ON jeux.users_idUser = users.idUser
    WHERE idJeu = :id";

    $reqSelectInfoJeu = $db->prepare($selectInfoJeu);
    $reqSelectInfoJeu->bindParam(':id', $id);
    $reqSelectInfoJeu->execute();

    $jeux = array();

    while ($data = $reqSelectInfoJeu->fetchObject()) {
        array_push($jeux, $data);
    }
}
?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5">Detail du jeu</h3>
    <?php
    foreach ($jeux as $jeu) {
    ?>
        <div class="row">
            <div class="col-sm-12 offset-md-2 col-md-4 mt-3">
                <img class=" imageDetail mx-auto d-flex justify-content-center" src="public/image/<?= $jeu->imageJeu ?>" alt="image <?= $jeu->titreJeu ?>">
                <h4 class=" titreJeu mt-2 d-flex justify-content-center w-100"><?= $jeu->titreJeu ?> <?= strtolower($jeu->consoleJeu) ?></h4>
            </div>
            <div class="col-sm-12 offset-md-1 col-md-5 mt-3">
                <div id="informations">
                    <!-- Si la personne n'est pas connectée alors elle ne pourra pas cliquer sur le lien  -->
                    <?php
                    if (!$_SESSION['login']) {
                    ?>
                        <small>Connectez vous pour accéder à la page du revendeur :)</small>
                        <p>Possesseur: <?= $jeu->prenomUser ?> <?= $jeu->nomUser ?></p>
                    <?php
                    } else {
                    ?>
                        <p>Possesseur:<a name="lien" href="<?= $router->generate('Ma_Page') ?>?nom=<?= $jeu->nomUser ?>&prenom=<?= $jeu->prenomUser ?>"><?= $jeu->prenomUser ?> <?= $jeu->nomUser ?></a></p>
                    <?php
                    }
                    ?>
                    <p>Prix demandé: <?= $jeu->prixJeu ?>€</p>
                    <p>Commentaire de <strong><?= $jeu->prenomUser ?></strong>: <?= $jeu->commentaireJeu ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>