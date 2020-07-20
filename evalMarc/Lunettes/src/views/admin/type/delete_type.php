<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "DELETE FROM type 
WHERE idtype = :id";

$req= $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

header('Location: /admin/type');
