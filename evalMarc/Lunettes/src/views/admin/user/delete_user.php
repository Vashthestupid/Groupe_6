<?php 

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}

$sql = "DELETE FROM user WHERE user.id = :id";

$req = $db->prepare($sql);
$req->bindParam(':id', $id);
$req->execute();

header('Location: /admin/user');


?>