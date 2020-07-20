<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $sql = "DELETE FROM commande
    WHERE commande.id = :id";

    $req = $db->prepare($sql);
    $req->bindParam(':id', $id);
    $req->execute();

    // header('Location: /monCompte');
    echo '<meta http-equiv="refresh" content="0; url=/monCompte"/>';
}

