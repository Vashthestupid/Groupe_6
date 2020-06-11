<?php

$produits = new Jeux($db);
$listeJeux = $produits->selectAll();
// var_dump($listeJeux);

?>
<div class="container">
    <?php
    if ($_SESSION['login']) {
        echo "<p class='mt-3'>Bienvenue " . $_SESSION['prenom'] . "</p>";
    }
    ?>
    <h3 class="d-flex justify-content-center mt-5 ">Voici la liste des produits</h3>
    <div class="row">
        <?php
        foreach ($listeJeux as $jeux) {
        ?>
            <div class="mt-4 col-sm-12 col-md-6 col-lg-4">
                <div class="card d-flex mx-auto">
                    <img src="/public/image/<?= $jeux['imageJeu']?>" alt="jaquette de<?= $jeux['titreJeu'] ?>" class="card-img-top mx-auto">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-center "><?= $jeux['titreJeu']?></h6>
                    </div>
                    <div class="card-footer">
                        <p class="d-flex justify-content-center">Ajouté par <?= $jeux['prenomUser'] ?> <?= $jeux['nomUser'] ?></p>
                        <a href="<?= $router->generate('Jeux') ?>?id=<?= $jeux['idJeu'] ?>">
                            <button type="submit" class="w-100">Voir +</button>
                        </a>
                    </div>

                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>