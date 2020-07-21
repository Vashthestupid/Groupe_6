<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = "SELECT * FROM status WHERE status.id = :id";

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
                <th>Nom du status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data->id ?></td>
                <td><?= $data->nomStatus ?></td>
            </tr>
        </tbody>
    </table>
    <div class="link">
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('status') ?>">Retour</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editStatus') ?>?id=<?= $data->id ?>">Edition</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('deleteStatus') ?>?id=<?= $data->id ?>">Supprimer</a>
        </div>

    </div>
</div>