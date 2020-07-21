<?php

$sql = "SELECT * FROM status";

$req = $db->prepare($sql);
$req->execute();

$status = array();

while ($data = $req->fetchObject()) {
    array_push($status, $data);
}

?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($status as $row) {
            ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><?= $row->nomStatus ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('showStatus') ?>?id=<?= $row->id ?>">Voir</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editStatus') ?>?id=<?= $row->id ?>">Editer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="new">
        <a class="btn btn-outline-dark" href="<?= $router->generate('newStatus') ?>">Créer un nouveau status</a>
    </div>
</div>