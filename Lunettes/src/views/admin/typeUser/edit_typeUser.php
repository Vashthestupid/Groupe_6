<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM type_user WHERE type_user.idType = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$data = $req->fetchObject();

// Modification du champ 

if(isset($_POST['valider'])){
    $type = htmlspecialchars(trim($_POST['typeUser']));

    $update = "UPDATE type_user
    SET nomType = :type
    WHERE type_user.idType = :idType";

    $reqUpdate = $db->prepare($update);
    $reqUpdate->bindParam(':type', $type);
    $reqUpdate->bindParam(':idType', $id);
    $reqUpdate->execute();

    // header('Location: /admin/typeUser');
    echo '<meta http-equiv="refresh" content="0; url=/admin/typeUser"/>';

}

?>
<div id="editTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Modifier le type</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Nom du type d'utilisateur</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="typeUser" id="typeUser" value="<?= $data->nomType ?>">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>