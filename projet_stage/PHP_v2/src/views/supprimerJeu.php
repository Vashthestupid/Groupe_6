<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $deleteJeu = "DELETE FROM jeux WHERE idJeu = :id";

    $reqDeleteJeu = $db->prepare($deleteJeu);
    $reqDeleteJeu->bindParam(':id', $id);
    $reqDeleteJeu->execute();
}
header('Location: /');
