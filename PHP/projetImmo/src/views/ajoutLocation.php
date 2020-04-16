<?php 

session_start();
if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
}else{
    $email = '';
}

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

//Si les champs envoyés existent.
if(isset($_POST['name']) && isset($_POST['resume']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['status']) && isset($_POST['superficie']) && isset($_POST['nbrePiece'])
    && isset($_POST['desc'])){
        $nom = htmlspecialchars(trim($_POST['name']));
        $resume = htmlspecialchars(trim($_POST['resume']));
        $prix = intval($_POST['price']);
        $img = htmlspecialchars(trim($_POST['img']));
        $status = intval($_POST['nbrePiece']);
        $superficie = intval($_POST['superficie']);
        $nbrePiece = intval($_POST['nbrePiece']);
        $description = htmlspecialchars(trim($_POST['desc']));
    }

//verifie si les champs envoyés n'existent pas déjà dans la base de données.

$verif =  " SELECT COUNT(*) as nb
            FROM location
            INNER JOIN detail ON location.detail_iddetail = detail.iddetail
            WHERE location.titreLocation = :nomLocation";

$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':nomLocation', $nom);
$reqVerif->execute();

$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    // Si aucun des champs envoyés ne correspond à un champ présent dans la base de données, alors on les inséres dans celle-ci.
    //Tout d'abords le detail 

    $insertDetail = "INSERT INTO detail (Superficiecdetail,nbPiecedetail,descdetail) VALUES (:superficie,:nbPiece,:description)";

    $reqInsertDetail = $db->prepare($insertDetail);
    $reqInsertDetail->bindparam(':superficie', $superficie);
    $reqInsertDetail->bindparam(':nbPiece', $nbrePiece);
    $reqInsertDetail->bindparam(':description', $description);
    $reqInsertDetail->execute();

    $lastInsertIdDetail = $db->lastInsertId();

    //Puis la location

    $insertLocation = "INSERT INTO location (titreLocation,resumeLocation,prixLocation,imageLocation,statusLocation,dateCreaLocation,dateModifLocation,detail_iddetail)
     VALUES(:nomLocation,:resume,:prix,:img,:status,NOW(),NULL,$lastInsertIdDetail)";

    $reqInsertLocation = $db->prepare($insertLocation);
    $reqInsertLocation->bindParam(':nomLocation', $nom);
    $reqInsertLocation->bindParam(':resume', $resume);
    $reqInsertLocation->bindParam(':prix', $prix);
    $reqInsertLocation->bindParam(':img', $img);
    $reqInsertLocation->bindParam(':status', $status);
    $reqInsertLocation->execute();

    $listeLocations = array();

}



?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">DamienLocation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajouter une location <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item">
                    <a href="deconnexion.php" class="nav-link">Deconnexion</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <?php
        // Verifier si les champs sont remplis.
        if(empty($_POST['name']) || empty($_POST['resume']) ||empty($_POST['price']) || empty($_POST['img']) || empty($_POST['status']) || empty($_POST['superficie'])
            || empty($_POST['nbrePiece']) || empty($_POST['desc'])){

            echo '<div class="alert alert-danger d-flex justify-content-center w-50">Tous les champs doivent être renseignés.</div>';
        } else {
            echo '<div class="alert alert-success d-flex justify-content-center w-50">Votre formulaire a bien été envoyé.</div>';
        }
        ?>
    </div>
    <h2 class="d-flex justify-content-center">Ajout d'une location</h2>
    <hr>
    <form method="post" action="ajoutLocation.php" class="offset-md-2 col-md-8">
        <p class="font-weight-bold">Informations Principales:</p>
        <div class="form-row">
            <div class="form-group offset-md-1 col-md-5">
                <label for="nom" class="d-flex justify-content-center">Nom du bien</label>
                <input type="text" class="form-inline w-100" name="name" id="nom">
            </div>
            <div class="form-group col-md-5">
                <label for="resumé" class="d-flex justify-content-center">Résumé du bien</label>
                <input type="text" class="form-inline w-100" name="resume" id="resumé">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group offset-md-1 col-md-5">
                <label for="prix" class="d-flex justify-content-center">Prix</label>
                <input type="number" class="form-inline w-100" name="price" id="prix">
            </div>
            <div class="form-group col-md-5">
                <label for="image" class="d-flex justify-content-center">Photo du bien</label>
                <input type="text" class="form-inline w-100" name="img" id="image">
            </div>
        </div>
        <br>
        <div class="form-group offset-md-4 col-md-5">
            <label for="statut">Disponibilité:</label>
            <select name="status" >
                <option value="0">Indisponible</option>
                <option value="1">Disponible</option>
            </select>
        </div>
        <p class="font-weight-bold">Détails:</p>
        <div class="form-row">
            <div class="form-group offset-md-1 col-md-5">
                <label for="mesure" class="d-flex justify-content-center">Superficie</label>
                <input type="number" class="form-inline w-100" name="superficie" id="mesure">
            </div>
            <div class="form-group col-md-5">
                <label for="nbrePieces" class="d-flex justify-content-center">Nombre de pièces</label>
                <input type="number" class="form-inline w-100" name="nbrePiece" id="nbrePieces">
            </div>
        </div>
        <br>
        <div class="form-group offset-md-3 col-md-6">
            <label for="description" class="d-flex justify-content-center">Description du bien</label>
            <textarea name="desc" class="form-inline w-100" id="description" cols="30" rows="2"></textarea>
        </div>
        <div class="form-group offset-md-5 col-md-2">
            <input type="submit" value="Envoyer">
        </div>
    </form>
</div>
<?php
footer();
