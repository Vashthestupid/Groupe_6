<?php

// On va récupérer la totalité des jeux 
$selectAll = "SELECT jeux.titreJeu,
jeux.imageJeu,
jeux.commentaireJeu,
users.nomUser,
users.prenomUser
FROM jeux
INNER JOIN users on jeux.users_idUser = users.idUser";

$reqSelectAll = $db->prepare($selectAll);
$reqSelectAll->execute();

$jeux = array();

while ($data = $reqSelectAll->fetchObject()) {
    array_push($jeux, $data);
}


?>
<div class="container">
    <?php
    if($_SESSION['login']){
        echo "Bienvenue ". $_SESSION['prenom'];
    }
    ?>
    <h3 class="d-flex justify-content-center mt-5 ">Voici la liste des produits</h3>
    <div class="row">
        <?php
        foreach ($jeux as $jeu) {
        ?>
            <div class="mt-2 col-sm-12 col-md-6 col-lg-4">
                <div class="card d-flex mx-auto">
                    <img src="/public/image/<?= $jeu->imageJeu ?>" alt="<?= $jeu->titreJeu ?>" class="card-img-top mx-auto">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-center "><?= $jeu->titreJeu ?></h6>
                    </div>
                    <div class="card-footer">
                        <p class="d-flex justify-content-center">Ajouté par <?= $jeu->prenomUser?> <?= $jeu->nomUser?></p>
                        <button class="w-100">Voir plus</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>