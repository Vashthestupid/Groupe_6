<?php

use App\Model\Users;
use App\Model\Jeux;

// Récupérer le nom et prénom du vendeur
$vendeur = new Users($db);
$vendeur->setNom($_GET['nom']);
$vendeur->setPrenom($_GET['prenom']);

// pour récupérer MES informations
$maPage = new Users($db);
$maPage->setId($_SESSION['idUser']);

// Modifier MES informations
if(isset($_POST['valider'])){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])){
        $maPage->setNom($_POST['nom']);
        $maPage->setPrenom($_POST['prenom']);
        $maPage->setMail($_POST['mail']);
        $maPage->setMdp($_POST['mdp']);
        $maPage->setAdresse($_POST['adresse']);
        $maPage->setCp($_POST['cp']);
        $maPage->setVille($_POST['ville']);
        $maPage->setId($_POST['id']);
        $maPage->update();
    }
}

// pour récupérer MES jeux
$monJeu = new Jeux($db);
$monJeu->setId($_POST['id']);

// Supprimer un jeu
if (isset($_POST['delete'])) {
    $monJeu->delete();
}

// Modifier le jeu en récupérant les variables de la page updateJeu
if (isset($_POST['valider'])) {
    if (isset($_POST['titre']) && isset($_POST['console']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_POST['commentaire'])) {
        $monJeu->setTitre($_POST['titre']);
        $monJeu->setConsole($_POST['console']);
        $monJeu->setPrix($_POST['prix']);
        $monJeu->setImage($_POST['image']);
        $monJeu->setCommentaire($_POST['commentaire']);
        $monJeu->setId($_POST['id']);
        $monJeu->update();
    }
}

?>
<div class="container">
    <?php
    // Si l'utilisateur arrive de la page info.php 
    if (isset($_GET['nom']) && isset($_GET['prenom'])) {
        $infosVendeur = $vendeur->selectUserGET();
        $listeJeuxVendeur = $vendeur->selectJeuxVendeur();

        foreach ($infosVendeur as $vendeur) {
    ?>
            <h3 class="d-flex justify-content-center mt-5 ">Detail du vendeur</h3>
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-3 mt-5">
                    <div class="informations">
                        <h5 class="d-flex justify-content-center">Informations vendeur</h5>
                        <p><?= $vendeur['prenomUser'] . ' ' . $vendeur['nomUser'] ?></p>
                        <p><?= $vendeur['mailUser'] ?></p>
                        <p><?= $vendeur['adresseUser'] ?></p>
                        <p><?= $vendeur['cpUser'] ?></p>
                        <p><?= $vendeur['villeUser'] ?></p>
                    </div>
                </div>
                <div class="col-sm-12 offset-md col-md-8 col-lg-9 mt-5">
                    <div class="tableauJeux table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Console</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listeJeuxVendeur as $jeux) {
                                ?>
                                    <tr>
                                        <td><?= $jeux['titreJeu'] ?></td>
                                        <td><?= $jeux['prixJeu'] ?>€</td>
                                        <td><?= $jeux['consoleJeu'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        // Si l'utilisateur souhaite gérer ses propres jeux 
        $infosUser = $maPage->selectUserSession();
        $listeJeuxUser = $maPage->selectJeuxUser();

        foreach ($infosUser as $user) {
        ?>
            <h3 class="d-flex justify-content-center mt-5 ">Votre page</h3>
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-3 mt-5">
                    <div class="informations">
                        <h5 class="d-flex justify-content-center">Informations vendeur</h5>
                        <p><?= $user['prenomUser'] . ' ' . $user['nomUser'] ?></p>
                        <p><?= $user['mailUser'] ?></p>
                        <p><?= $user['adresseUser'] ?></p>
                        <p><?= $user['cpUser'] ?></p>
                        <p><?= $user['villeUser'] ?></p>
                        <p><a href="<?= $router->generate('Modifier_Utilisateur')?>?id=<?= $user['id']?>">modifier mes informations</a></p>
                    </div>
                </div>
                <div class="col-sm-12 offset-md col-md-8 col-lg-9 mt-5">
                    <div class="tableauJeux table-responsive">
                        <table id="tableauUser" class="table">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Prix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listeJeuxUser as $jeu) {
                                ?>
                                    <tr>
                                        <td><?= $jeu['titreJeu'] ?></td>
                                        <td><?= $jeu['prixJeu'] ?>€</td>
                                        <td class="d-flex">
                                            <form action="Detail_du_jeu" method="get">
                                                <input type="number" name="id" value="<?= $jeu['id'] ?>" hidden>
                                                <input class="btn btn-primary text-light mr-2 " name="action" type="submit" value="Lire">
                                            </form>
                                            <form action="Modifier_Jeu" method="get">
                                                <input type="number" name="id" value="<?= $jeu['id'] ?>" hidden>
                                                <input id="buttonUpdate" class="btn btn-warning text-light mr-2"  name='action' type="submit" value="Modifier">
                                            </form>
                                            <form method="post">
                                                <input type="number" name="id" value="<?= $jeu['id'] ?>" hidden>
                                                <input class="btn btn-danger text-light mr-2 " name="delete" type="submit" value="Supprimer">
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>