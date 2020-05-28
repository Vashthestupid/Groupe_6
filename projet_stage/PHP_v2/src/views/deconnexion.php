<?php

if (isset($_SESSION['login'])) {
    session_destroy();

    // Suppression du panier à chaque deconnexion
    $delete = "DELETE FROM panier";

    $reqDelete = $db->prepare($delete);
    $reqDelete->execute();
}
header('Location: /');
