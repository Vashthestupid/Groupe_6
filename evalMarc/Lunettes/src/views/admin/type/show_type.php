<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM type
INNER JOIN status ON type.status_id = status.id
WHERE idtype = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$data = $req->fetchObject();

?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Type de produit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data->idtype?></td>
                <td><?= $data->nomType?></td>
                <td><?= $data->nomStatus?></td>
            </tr>
        </tbody>
    </table>
    <div class="link">
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('type') ?>">Retour</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editType') ?>?id=<?= $data->idtype ?>">Edition</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('deleteType') ?>?id=<?= $data->idtype ?>">Supprimer</a>
        </div>

    </div>
</div>