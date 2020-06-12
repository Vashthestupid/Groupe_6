<?php

//Utilisation de la classe Users
$maPage = new Users($db);
// On passe les valeurs transmises par l'url
$maPage->setNom($_GET['nom']);
$maPage->setPrenom($_GET['prenom']);
$maPage->setId($_SESSION['idUser']);
// Utilisation de la classe Jeux
$mesJeux = new Jeux($db);
$mesJeux->setId($_POST['idJeu']);


// Si l'un des boutons du formulaire est activé 
if (isset($_POST['delete'])) {

    $mesJeux->deleteJeu();
}

?>
<div class="container">
    <?php
    // Si l'utilisateur arrive de la page info.php 
    if (isset($_GET['nom']) && isset($_GET['prenom'])) {
        $infosVendeur = $maPage->selectUserGET();
        $listeJeuxVendeur = $maPage->selectJeuAVendre();

        foreach ($infosVendeur as $vendeur) {
    ?>
            <h3 class="d-flex justify-content-center mt-5 ">Page de <?= $vendeur['prenomUser'] ?></h3>
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
                    <div class="tableauJeux">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Prix</th>
                                    <th>Console</th>
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
        $listeJeuxUser = $maPage->selectJeuUser();

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
                    </div>
                </div>
                <div class="col-sm-12 offset-md col-md-8 col-lg-9 mt-5">
                    <div class="tableauJeux">
                        <table class="table">
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
                                            <form method="post">
                                                <input type="number" name="idJeu" value="<?= $jeu['idJeu']?>" hidden >
                                                <input class="btn btn-danger text-light mr-2 " name="delete" type="submit" value="Supprimer">
                                            </form>
                                            <form method="post">
                                                <input type="number" name="idJeu" value="<?= $jeu['idJeu']?>" hidden>
                                                <input class="btn btn-warning text-light" name="update" type="submit" value="modifier">
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