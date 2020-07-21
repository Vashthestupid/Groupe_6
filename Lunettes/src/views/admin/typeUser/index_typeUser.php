<?php

$sql = "SELECT * FROM type_user";

$req = $db->prepare($sql);
$req->execute();

$typeUser = array();

while ($data = $req->fetchObject()) {
    array_push($typeUser, $data);
}

?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($typeUser as $type) {
            ?>
                <tr>
                    <td><?= $type->idType ?></td>
                    <td><?= $type->nomType ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('showTypeUser') ?>?id=<?= $type->idType ?>">Voir</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editTypeUser') ?>?id=<?= $type->idType ?>">Editer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="new">
        <a class="btn btn-outline-dark" href="<?= $router->generate('newTypeUser') ?>">Créer un nouveau type d'utilisateur</a>
    </div>
</div>