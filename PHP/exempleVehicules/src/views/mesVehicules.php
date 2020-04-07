<?php
error_reporting(E_ALL ^ E_NOTICE);

require '../config/config.php';
include_once 'elements/head.php';
include_once 'elements/footer.php';
require '../models/connect.php';

$db = connection();
head();


if(isset($_POST['mode']) AND isset($_POST['mark'])){
    $modele = htmlspecialchars(trim($_POST['mode']));
    $marque = htmlspecialchars(trim($_POST['mark']));

    $sqlInsertModele = "INSERT INTO modele(nomModele) VALUES(:modele)";
    $sqlInsertMarque = "INSERT INTO marque(nomMarque) VALUES(:marque)";

    $reqInsertModele = $db->prepare($sqlInsertModele);
    $reqInsertMarque = $db->prepare($sqlInsertMarque);

    $reqInsertModele->bindParam(":modele", $modele);
    $reqInsertMarque->bindParam(":marque", $marque);

    $reqInsertModele->execute();
    $reqInsertMarque->execute();
}

$marques = array();
$modeles = array();

$sqlSelectModele = "SELECT modele.nomModele FROM modele ORDER BY id DESC";
$sqlSelectMarque = "SELECT marque.nomMarque FROM marque ORDER BY id DESC";

$reqSelectModele = $db->prepare($sqlSelectModele);
$reqSelectMarque = $db->prepare($sqlSelectMarque);

$reqSelectModele->execute();
$reqSelectMarque->execute();

while($dataModele = $reqSelectModele->fetchObject()){
    array_push($modele, $dataModele);
}

while($dataMarque = $reqSelectMarque->fetchObject()){
    array_push($marque, $dataMarque);
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
        <?php
            foreach($modeles as $modele){
        ?>      
                <tr>
                    <td><?php $modeles->modele;?></td>
            }
        <?php
            foreach($marques as $marque){
        ?>
                    <td><?php $marques->marque;?></td>
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
