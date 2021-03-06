<?php
error_reporting(E_ALL & ~E_NOTICE);

// On récupère l'id via le $_GET provenant de la page "livre.php"
$idLivre = $_GET['id'];
// On se sert de l'id pour récupérer les élements le concernant dans la table "livres"
$selectLivre = "SELECT * FROM livres WHERE idLivre = :id";

$reqSelectLivre = $db->prepare($selectLivre);
$reqSelectLivre->bindParam(':id', $idLivre);
$reqSelectLivre->execute();

$livres = array();

while ($data = $reqSelectLivre->fetchObject()) {
    array_push($livres, $data);
}

// Si on clique sur le bouton ajout et qu'il existe,
// alors on l'insert dans la table panier.
if (isset($_POST['ajout'])) {
    $prix = intval($_POST['prix']);
    $insertPanier = "INSERT INTO panier(livres_idLivre, prix, users_idUser) VALUES (:id, :prix, :idUser )";

    $reqInsertPanier = $db->prepare($insertPanier);
    $reqInsertPanier->bindParam(':id', $idLivre);
    $reqInsertPanier->bindParam(':prix', $prix);
    $reqInsertPanier->bindParam(':idUser', $_SESSION['user']);
    $reqInsertPanier->execute();

    echo "<div class='alert alert-success'>Le produit a été ajouté au panier</div>";
}

?>
<br>
<div class="container">
    <?php
    // Si la personne connectée est admin 
	// alors on affiche les boutons modifier et supprimer
    if ($_SESSION['login'] && $_SESSION['role'] === 'admin') {
    ?>
        <div class="d-flex justify-content-center">
            <a class="mr-2" href="<?= $router->generate('modifierLivre') ?>?id=<?= $idLivre ?>">
                <button class="btn btn-warning">Modifier le produit</button>
            </a>
            <a href="<?= $router->generate('supprimerLivre') ?>?id=<?= $idLivre ?>">
                <button class="btn btn-danger text-dark">Supprimer le produit</button>
            </a>
        </div>
    <?php
    }
    ?>
    <div class="row mt-5">
        <?php
        foreach ($livres as $livre) {
        ?>
            <div class="image d-flex justify-content-center col-sm-12 col-md-7">
                <img class="imageDetail" src="../../public/image/<?= $livre->imageLivre ?>" alt="Jaquette <?= $livre->titreLivre ?>">
            </div>
            <div class="titre&description col-sm-12 col-md-5">
                <div class="titre col-sm-12 col-md-12">
                    <p class="d-flex mt-2 justify-content-center "><?= $livre->titreLivre ?></p>
                </div>
                <div class="desc mt-5 border border-secondary rounded bg-white col-sm-12 col-md-12">
                    <p class="d-flex justify-content-center">Description</p>
                    <p>Auteur: <?= $livre->auteurLivre ?></p>
                    <p>Genre: <?= $livre->genreLivre ?></p>
                    <p>Prix: <?= $livre->prixLivre ?> €</p>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="mt-5 col-sm-12 offset-md-3 col-md-6">
            <div class="col-sm-12 col-md-12 border border-secondary rounded bg-white">
                <p class="d-flex justify-content-center">Résumé</p>
                <p><?= $livre->resumeLivre ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            if ($_SESSION['login']) {
        ?>
            <div class=" mt-5 mx-auto">
                <form method="post">
                    <input type="number" name="prix" id="prix" value="<?= $livre->prixLivre ?>" hidden>
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