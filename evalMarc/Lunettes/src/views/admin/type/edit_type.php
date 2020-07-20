<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

// On récupère les différents status 
$selectStatus = "SELECT status.id,nomStatus FROM status";

$req = $db->prepare($selectStatus);
$req->execute();

$status = array();

while ($data = $req->fetchObject()) {
    array_push($status, $data);
}

// On récupère le nom du type de produit grâce à son id

$selectNomType = "SELECT nomType FROM type
WHERE idtype = :id";

$reqSelectNomType = $db->prepare($selectNomType);
$reqSelectNomType->bindParam(':id', $id);
$reqSelectNomType->execute();

$type = $reqSelectNomType->fetchObject();

// On effectue la modification

if(isset($_POST['valider'])) {
    $type = htmlspecialchars(trim($_POST['type']));
    $status = intval($_POST['status']);

    $update = "UPDATE type 
    SET nomType = :type,
    type.status_id = :status
    WHERE idtype = :idType";
   
    $reqUpdate = $db->prepare($update);
    $reqUpdate->bindParam(':type', $type);
    $reqUpdate->bindParam(':status', $status);
    $reqUpdate->bindParam(':idType', $id);
    $reqUpdate->execute();

    // var_dump($reqUpdate,$type,$status,$id);
    // die();
    header('Location: /admin/type');
}

?>
<div id="editTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Modifier le Type de produit</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Nom du type de produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="type" id="type" value="<?= $type->nomType ?>">
        </div>
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Status du type</label>
            <select class="d-flex mx-auto w-75" name="status" id="status">
                <?php
                foreach ($status as $row) {
                ?>
                    <option value="<?= $row->id ?>"><?= $row->nomStatus ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>