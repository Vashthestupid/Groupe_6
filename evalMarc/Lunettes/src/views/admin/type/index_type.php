<?php

$sql = "SELECT * FROM type";

$req = $db->prepare($sql);
$req->execute();

$types = array();

while ($data = $req->fetchObject()) {
    array_push($types, $data);
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
            foreach ($types as $type) {
            ?>
                <tr>
                    <td><?= $type->idtype?></td>
                    <td><?= $type->nomType ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('showType') ?>?id=<?= $type->idtype ?>">Voir</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editType') ?>?id=<?= $type->idtype ?>">Editer</a>
                    </td>
                </tr>
        </tbody>
    <?php
            }
    ?>
    </table>
    <div class="link">
        <a class="btn btn-outline-dark" href="<?= $router->generate('newType') ?>">
            Créer un nouveau type de produit
        </a>
    </div>
</div>