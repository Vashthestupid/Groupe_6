<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $deleteFilm = "DELETE FROM livres WHERE idLivre = :id";

    $reqDeleteFilm = $db->prepare($deleteFilm);
    $reqDeleteFilm->bindParam(':id', $id);
    $reqDeleteFilm->execute();
}



header('Location: /');
