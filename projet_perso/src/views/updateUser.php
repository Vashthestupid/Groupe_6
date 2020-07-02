<?php

use App\Model\Users;

$mesInfos = new Users($db);
$mesInfos->setId($_GET['id']);

$infos = $mesInfos->selectUserSession();

?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Modifier mes informations</h3>
    <div id="inscription">
        <?php
        foreach ($infos as $info) {
        ?>
            <form action='Ma_Page' method="post" class="offset-md-2 col-md-8">
                <input type="number" name="id" value="<?= $info['id']?>" hidden>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="name">Nom</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="nom" id="name" value="<?= $info['nomUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="firstname">Prénom</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="prenom" id="firstname" value="<?= $info['prenomUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="email">Adresse E-mail</label>
                    <input type="email" class="form-control w-75 d-flex mx-auto rounded-pill" name="mail" id="email" value="<?= $info['mailUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control w-75 d-flex mx-auto rounded-pill" name="mdp" id="mot_de_passe" value="<?= $info['mdpUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="adresse">Adresse Postale</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="adresse" id="adresse" value="<?= $info['adresseUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="code_postal">Code Postal</label>
                    <input type="number" class="form-control w-75 d-flex mx-auto rounded-pill" name="cp" id="code_postal" value="<?= $info['cpUser']?>">
                </div>
                <div class="form-group">
                    <label class="d-flex justify-content-center" for="ville">Ville</label>
                    <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="ville" id="ville" value="<?= $info['villeUser']?>">
                </div>
                <?php
                btnValider();
                ?>
            </form>
        <?php
        }
        ?>
    </div>
</div>