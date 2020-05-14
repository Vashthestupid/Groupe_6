<?php

session_start();
if (isset($_SESSION['login'])) {
    session_destroy();

    $deletePanier = "DELETE FROM panier";

    $reqDeletePanier = $db->prepare($deletePanier);
    $reqDeletePanier->execute();
}
header('Location: /');
