<?php
include_once 'elements/head.php';
include_once 'elements/footer.php';
head();

/*
$vehicules = array();
$sqlSelect = "SELECT marque.nomMarque modele.nomModele FROM marque,modele";
$reqSelect = $db->prepare($sqlSelect);
$reqSelect->execute();

while($date = $reqSelect->fetchObject()){
    array_push($vehicules, $data);
}
?>

    <h1>Liste de mes véhicules</h1>
    <hr>
    <table class="table table-hover mt-5 mb-5">
        <thead class="thead-dark">
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($vehicules as $vehicule){
            ?>
            <td><?php $marque->nomMarque;?></td>
            <td><?php $modele->nomModele;?></td>
        </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
    <div>
        <a href="../../index.php">
            <button type="button" class="btn btn-outline-dark">
                Accueil
            </button>
        </a>
    </div>

<?php
footer();