<?php

$sql = "SELECT user.id,
nomUser,
prenomUser
FROM user";

$req = $db->prepare($sql);
$req->execute();

$users = array();

while ($data = $req->fetchObject()) {
    array_push($users, $data);
}

?>
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->nomUser ?></td>
                    <td><?= $user->prenomUser?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('showUser')?>?id=<?= $user->id ?>">Voir</a>
                        <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editUser')?>?id=<?= $user->id?>">Editer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>