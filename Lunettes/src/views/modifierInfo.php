<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM user
WHERE id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$user = $req->fetchObject();

// Modification des informations de l'utilisateur

if(isset($_POST['valider'])){
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $adresse = htmlspecialchars(trim($_POST['adresse']));
    $cp = htmlspecialchars(trim($_POST['cp']));
    $ville = htmlspecialchars(trim($_POST['ville']));

    if(empty($nom) || empty($prenom) || empty($adresse) || empty($cp) || empty($ville)){
        echo 'Vous devez remplir tous les champs';
    } else {
        
        // On effectue les modifications

        $update = 'UPDATE user
        SET nomUser = :nom,
        prenomUser = :prenom,
        adresseUser = :adresse,
        cpUser = :cp,
        villeUser = :ville
        WHERE id = :idUser';

        $reqUpdate = $db->prepare($update);
        $reqUpdate->bindParam(':nom', $nom);
        $reqUpdate->bindParam(':prenom', $prenom);
        $reqUpdate->bindParam(':adresse', $adresse);
        $reqUpdate->bindParam(':cp', $cp);
        $reqUpdate->bindParam(':ville', $ville);
        $reqUpdate->bindParam(':idUser', $id);
        $reqUpdate->execute();

        echo '<meta http-equiv="refresh" content="0; url=/monCompte"/>';
    }
}

?>
<div id="modifInfo">
    <h2 class=" titleForm d-flex justify-content-center">Modifier vos informations</h2>
    <form method="post" class="offset-md-2 col-md-8 mt-5">
        <div class="form-group">
            <label for="nom" class="d-flex justify-content-center">Nom</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom" value="<?= $user->nomUser?>">
        </div>
        <div class="form-group">
            <label for="prenom" class="d-flex justify-content-center">Prenom</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="prenom" id="prenom" value="<?= $user->prenomUser?>">
        </div>
        <div class="form-group">
            <label for="adresse" class="d-flex justify-content-center">Adresse</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse" value='<?= $user->adresseUser?>'>
        </div>
        <div class="form-group">
            <label for="cp" class="d-flex justify-content-center">Code Postal</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="cp" id="cp" value="<?= $user->cpUser?>">
        </div>
        <div class="form-group">
            <label for="ville" class="d-flex justify-content-center">Ville</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville" value="<?= $user->villeUser?>">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>