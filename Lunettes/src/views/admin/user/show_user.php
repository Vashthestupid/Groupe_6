<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = "SELECT * 
FROM user
INNER JOIN type_user ON user.type_user_idType = type_user.idType
WHERE user.id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

$user = $req->fetchObject();


?>
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de l'utilisateur</th>
                <th>Prenom de l'utilisateur</th>
                <th>Rôle de l'utilisateur</th>
                <th>Mail de l'utilisateur</th>
                <th>Adresse de l'utilisateur</th>
                <th>Code Postal</th>
                <th>Ville</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->nomUser ?></td> 
                <td><?= $user->prenomUser ?></td>
                <td><?= $user->nomType ?></td>
                <td><?= $user->mailUser ?></td>
                <td><?= $user->adresseUser ?></td>
                <td><?= $user->cpUser ?></td>
                <td><?= $user->villeUser ?></td>
            </tr>
        </tbody>
    </table>
    <div class="link">
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('user')?>">Retour</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('editUser')?>?id=<?= $user->id?>">Edition</a>
        </div>
        <div>
            <a class="btn btn-sm btn-outline-dark" href="<?= $router->generate('deleteUser')?>?id=<?= $user->id?>">Supprimer</a>
        </div>

    </div>
</div>