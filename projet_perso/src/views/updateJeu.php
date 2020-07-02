<?php

use App\Model\Jeux;

$jeu = new Jeux($db);
$jeu->setId($_GET['id']);
$infosJeu = $jeu->selectJeu();


?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Modifier un jeu</h3>
    <div id="insertGame">
        <?php
        foreach ($infosJeu as $info) {
        ?>
            <form action="Ma_Page" method="post" class="offset-md-2 col-md-8">
                <input type="number" name="id" id="id" value="<?= $info['id']?>" hidden>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="title">Titre du jeu</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="titre" id="title" value='<?= $info['titreJeu'] ?>'>
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="console">Console</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="console" id="console" value='<?= $info['consoleJeu'] ?>'>
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="price">Prix du Jeu</label>
                    <input type="number" class="form-control w-75 d-flex mx-auto rounded-pill" name="prix" id="price" value="<?= $info['prixJeu'] ?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="picture">Image du jeu</label>
                    <input type="file" class="w-75 d-flex mx-auto" name="image" id="picture">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="comment">Commentaire sur le jeu</label>
                    <textarea class="form-control d-flex w-75 mx-auto" name="commentaire" id="comment" rows="5"><?= $info['commentaireJeu'] ?></textarea>
                </div>
                <?php
                btnValider(); ?>
                <small id="nameButton" name="ajouterJeu" class="form-text text-muted d-flex justify-content-center">VALIDER</small>
            </form>
        <?php
        }
        ?>
    </div>
</div>