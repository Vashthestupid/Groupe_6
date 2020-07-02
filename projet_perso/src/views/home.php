<?php

use App\Model\Jeux;
use App\Model\Users;

$jeux = new Jeux($db);
$listeJeux = $jeux->selectAll();

?>
<div class="container">
    <?php
    if ($_SESSION['login']) {
        echo "<p class=' alert alert-success mt-3'>Bienvenue " . $_SESSION['prenom'] .  "</p>";
    }
    if(isset($_GET['erreur'])){
        $erreur = new Users($db);
        $erreur->setErreur($_GET['erreur']);
        $erreur->erreur();
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
                        <p id="ajoutBy"class="d-flex justify-content-center">Ajouté par <?= $jeux['prenomUser'] ?> <?= $jeux['nomUser'] ?></p>
                        <a href="<?= $router->generate('Detail_du_jeu') ?>?id=<?= $jeux['id'] ?>">
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