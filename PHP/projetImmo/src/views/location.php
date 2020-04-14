<?php
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();


$select = "SELECT location.imageLocation,
            location.prixLocation,
            location.titreLocation,
            location.idlocation
            FROM location
            ORDER BY location.idlocation
            DESC
            LIMIT 0,3 ";
$reqSelect = $db->prepare($select);
$reqSelect->execute();
$locations = array();

while($data = $reqSelect->fetchObject()){
    array_push($locations, $data);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">DamienLocation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="location.php">Location<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <div class="row">
        <h1>Voici une sélection de nos biens immobiliers </h1>
    </div>

    <br>

    <div class="card-group">
        <?php
        foreach($locations as $location){
        ?>
            <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <img class="card-img-top" src="<?= $location->imageLocation ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $location->titreLocation ?></h5>
                <div class="row">
                    <form action="detail.php" method="get">
                        <input type="number" name="id" value="<?= $location->idlocation?>" readonly hidden>
                        <input type="text" name="action" value="lire" readonly hidden>
                        <input type="submit" value="Voir +" class="btn btn-outline-secondary">
                    </form>         
                </div>
            </div>
            <div class="card-footer">
                <p>Prix: <?= $location->prixLocation?>€</p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
footer();