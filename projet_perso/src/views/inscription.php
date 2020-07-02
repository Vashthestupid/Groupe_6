<?php

use App\Model\Users;

$user = new Users($db);

if (isset($_POST['valider'])) {
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville'])) {
        echo "Vous devez remplir tous les champs";
    } else {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setMail($_POST['mail']);
            $user->setMdp($_POST['mdp']);
            $user->setAdresse($_POST['adresse']);
            $user->setCp($_POST['cp']);
            $user->setVille($_POST['ville']);
            $user->insert();
        }
    }
}


?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Formulaire d'inscription</h3>
    <div id="inscription">
        <form method="post" class="offset-md-2 col-md-8">
            <div class="form-group">
                <label class="d-flex justify-content-center" for="name">Nom</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="nom" id="name">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="firstname">Prénom</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="prenom" id="firstname">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="email">Adresse E-mail</label>
                <input type="email" class="form-control w-75 d-flex mx-auto rounded-pill" name="mail" id="email">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="mot_de_passe">Mot de passe</label>
                <input type="password" class="form-control w-75 d-flex mx-auto rounded-pill" name="mdp" id="mot_de_passe">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="adresse">Adresse Postale</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="adresse" id="adresse">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="code_postal">Code Postal</label>
                <input type="number" class="form-control w-75 d-flex mx-auto rounded-pill" name="cp" id="code_postal">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="ville">Ville</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="ville" id="ville">
            </div>
            <?php
            btnValider();
            ?>
        </form>
    </div>
</div>