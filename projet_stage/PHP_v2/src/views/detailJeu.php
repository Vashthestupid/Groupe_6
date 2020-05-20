<?php
error_reporting(E_ALL & ~E_NOTICE);

$idJeu = $_GET['id'];
$selectJeu = "SELECT * FROM jeux WHERE idJeu = :id";
$reqSelectJeu = $db->prepare($selectJeu);
$reqSelectJeu->bindParam(':id', $idJeu);
$reqSelectJeu->execute();

$jeux = array();

while ($data = $reqSelectJeu->fetchObject()) {
    array_push($jeux, $data);
}
if (isset($_POST['ajout'])) {
    $prix = intval($_POST['prix']);
    $insertPanier = "INSERT INTO panier(jeux_idJeu, prix) VALUES(:id, :prix)";

    $reqInsertPanier = $db->prepare($insertPanier);
    $reqInsertPanier->bindParam(':id', $idJeu);
    $reqInsertPanier->bindParam(':prix', $prix);
    $reqInsertPanier->execute();

    echo "<div class='alert alert-success'>Le produit a été ajouté au panier</div>";
}

?>
<div class="container">
    <?php
    if ($_SESSION['login'] && $_SESSION['role'] === 'admin') {
    ?>
        <div class=" mt-2 d-flex justify-content-center">
            <a class="mr-2" href="<?= $router->generate('modifierJeu') ?>?id=<?= $idJeu ?>">
                <button class="btn btn-warning">Modifier le produit</button>
            </a>
            <a href="<?= $router->generate('supprimerJeu') ?>?id=<?= $idJeu ?>">
                <button class="btn btn-danger text-dark">Supprimer le produit</button>
            </a>
        </div>
    <?php
    }
    ?>
    <div class="row mt-5">
        <?php
        foreach ($jeux as $jeu) {
        ?>
            <div class="image d-flex justify-content-center col-sm-12 col-md-7">
                <img class="w-50" src="../../public/image/<?= $jeu->imageJeu ?>" alt="Jaquette <?= $jeu->titreJeu ?>">
            </div>
            <div class="titre&description col-sm-12 col-md-5">
                <div class="titre col-sm-12 col-md-12">
                    <p class="d-flex mt-2 justify-content-center"><?= $jeu->titreJeu ?></p>
                </div>
                <div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
                    <p class="d-flex justify-content-center">Description</p>
                    <p>Studio de Développement: <?= $jeu->studioJeu ?></p>
                    <p>Genre: <?= $jeu->genreJeu ?></p>
                    <p>Prix: <?= $jeu->prixJeu ?> €</p>
                    <p>Nombre de joueurs maximum: <?= $jeu->nombreJoueurMax?> personne(s)</p>
                    <p>Jeu Online : <?= $jeu->onlineJeu?></p>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="mt-5 col-sm-12 offset-md-3 col-md-6">
            <div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
                <p class="d-flex justify-content-center">Résumé</p>
                <p><?= $jeu->resumeJeu ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            if ($_SESSION['login']) {
        ?>
            <div class=" mt-5 mx-auto">
                <form method="post">
                    <input type="number" name="prix" id="prix" value="<?= $jeu->prixJeu ?>" hidden>
                    <input type="submit" name="ajout" class="btn btn-secondary" value="Ajouter au panier">
                </form>
            </div>
        <?php
            }
        ?>
    </div>
<?php
        }
?>
</div>