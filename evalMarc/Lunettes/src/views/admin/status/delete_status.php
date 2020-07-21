<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

$sql = 'DELETE FROM status
WHERE status.id = :id';

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

header('Location: /admin/status');
