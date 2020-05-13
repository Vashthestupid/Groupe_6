<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $deleteFilm = "DELETE FROM film WHERE idFilm = :id";

    $reqDeleteFilm = $db->prepare($deleteFilm);
    $reqDeleteFilm->bindParam(':id', $id);
    $reqDeleteFilm->execute();
}

header('Location: /');
