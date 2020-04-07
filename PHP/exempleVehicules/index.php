<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require 'src/models/connect.php';


head();

$db=Connection();


if(isset($_POST["mod"])) {
    $modele = htmlspecialchars(trim($_POST["mod"]));
    $sqlInsert="INSERT INTO modele(nomModele) VALUE(:modele)";
    $req=$db->prepare($sqlInsert);
    $req->bindParam(":modele",$modele);
    $req->execute();
} 

if(isset($_POST['mark'])){
    $marque = htmlspecialchars(trim($_POST["mark"]));
    $sqlAjout = "INSERT INTO marque(nomMarque) VALUE(:marque)";
    $req=$db->prepare($sqlAjout);
    $req->bindParam(":marque",$marque);
    $req->execute();
}



?>
    <h1>Mes Vehicules</h1>
    <hr>
    <div>
        <form method="POST">

            <div class="form-group">
                <label for="modele">Modele</label>
                <input type="text" name="mod" class="form-control" id="modele">
            </div>
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="mark" class="form-control" id="marque">

            </div>
            <button type="submit" class="btn btn-outline-dark">Envoyer</button>
        </form>
    </div>

<?php
footer();