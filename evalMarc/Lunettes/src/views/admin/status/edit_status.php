<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM status WHERE status.id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$data = $req->fetchObject();

// Modification du champ 

if(isset($_POST['valider'])){
    $status = htmlspecialchars(trim($_POST['status']));

    $update = "UPDATE status
    SET nomStatus = :status
    WHERE status.id = :idStatus";

    $reqUpdate = $db->prepare($update);
    $reqUpdate->bindParam(':status', $status);
    $reqUpdate->bindParam(':idStatus', $id);
    $reqUpdate->execute();

    header('Location: /admin/status');

}

?>
<div id="editStatus" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Modifier le status</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Nom du type d'utilisateur</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="status" id="status" value="<?= $data->nomStatus ?>">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>