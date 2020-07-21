<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM type_user WHERE type_user.idType = :id";

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
                <th>Nom du type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data->idType ?></td>
                <td><?= $data->nomType ?></td>
            </tr>
        </tbody>
    </table>
    <div class="link">
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('typeUser') ?>">Retour</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editTypeUser') ?>?id=<?= $data->idType ?>">Edition</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('deleteTypeUser') ?>?id=<?= $data->idType ?>">Supprimer</a>
        </div>

    </div>
</div>