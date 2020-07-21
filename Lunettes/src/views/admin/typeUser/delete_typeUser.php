<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = 'DELETE FROM type_user
WHERE type_user.idType = :id';

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

// header('Location: /admin/typeUser');
echo '<meta http-equiv="refresh" content="0; url=/admin/typeUser"/>';
