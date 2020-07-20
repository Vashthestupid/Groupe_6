<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$selectRole = "SELECT * FROM type_user";

$reqSelectRole = $db->prepare($selectRole);
$reqSelectRole->execute();

$roles = array();

while ($data = $reqSelectRole->fetchObject()) {
    array_push($roles, $data);
}

if (isset($_POST['valider'])) {
    $role = intval($_POST['role']);

    $sql = "UPDATE user 
    SET type_user_idType = :role
    WHERE user.id = :id";

    $req = $db->prepare($sql);
    $req->bindParam(':role', $role);
    $req->bindParam(':id', $id);
    $req->execute();

    header('Location: /admin/user');
}


?>
<div id="editTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Modifier l'utilisateur</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Rôle de l'utilisateur</label>
            <select class="d-flex mx-auto w-75" name="role" id="role">
                <?php
                foreach ($roles as $role) {
                ?>
                    <option value="<?= $role->idType?>"><?= $role->nomType?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>