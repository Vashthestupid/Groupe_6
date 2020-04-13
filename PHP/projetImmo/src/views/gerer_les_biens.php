<?php 
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

$select = " SELECT location.idlocation,
            location.titreLocation,
            location.dateCreaLocation,
            location.prixLocation
            FROM location
            ORDER BY location.idLocation
            DESC";
$reqSelect = $db->prepare($select);
$reqSelect->execute();

$listeLocations = array();

while($data = $reqSelect->fetchObject()){
    array_push($listeLocations, $data);
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
            <li class="nav-item ">
                <a class="nav-link" href="location.php">Location</a>
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
            <li class="nav-item active ">
                <a class="nav-link" href="#">Gérer les biens<span class="sr-only">(current)</a>
            </li> 
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Liste des locations</h2>
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nom de la location</th>
                <th>Date de création</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
               foreach($listeLocations as $location){
            ?>
                <tr>
                    <td><?= $location->idlocation?></td>
                    <td><?= $location->titreLocation?></td>
                    <td><?= $location->dateCreaLocation?></td>
                    <td><?= $location->prixLocation?> €</td>
                    <td>
                        <div>
                            <form method="get" action="detail.php">
                                <input type="number" name="id" value="<?= $location->idlocation?>" readonly hidden>
                                <input type="text" name="action" value="lire" readonly hidden>
                                <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button>
                            </form>
                            <form method="get" action="update.php">
                                <input type="number" name="id" value="<?= $location->idlocation ?>" readonly hidden>
                                <input type="text" name="action" value="modify" readonly hidden>
                                <button class="btn btn-warning mr-1" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button>
                            </form>
                            <form method="get" action="delete.php">
                                <input type="number" name="id" value="<?= $location->idlocation?>"  readonly hidden>
                                <input type="text" name="action" value="delete" readonly hidden>
                                <button class="btn btn-danger mr-1" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button>
                            </form>	
                        </div>
                    </td>
                </tr>
            <?php
               }
            ?>
        </tbody>
    </table>
</div>
<?php 

footer();