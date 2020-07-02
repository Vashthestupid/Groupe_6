<?php

use App\Model\Jeux;

$recherche = new Jeux($db);

if(isset($_POST['search'])){
    if(empty($_POST['recherche'])){
        echo "Vous n'avez rien donné aucun produit à rechercher";
        die();
    } else {
        if (isset($_POST['recherche'])) {
            $recherche->setSearch($_POST['recherche']);
            $result = $recherche->recherche();
        }
    }
}

?>
<div class="container">
    <div id="response">
    </div>    
    <h3 class="d-flex justify-content-center mt-5 ">Résultat de votre recherche</h3>
    <div class="row">
        <?php
        foreach ($result as $jeu) {
        ?>
            <div class="mt-4 col-sm-12 col-md-6 col-lg-4">
                <div class="card d-flex mx-auto">
                    <img src="/public/image/<?= $jeu['imageJeu']?>" alt="jaquette de<?= $jeu['titreJeu'] ?>" class="card-img-top mx-auto">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-center "><?= $jeu['titreJeu']?></h6>
                    </div>
                    <div class="card-footer">
                        <p id="ajoutBy"class="d-flex justify-content-center">Ajouté par <?= $jeu['prenomUser'] ?> <?= $jeu['nomUser'] ?></p>
                        <a href="<?= $router->generate('Detail_du_jeu') ?>?id=<?= $jeu['id'] ?>">
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