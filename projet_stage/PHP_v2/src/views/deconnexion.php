<?php

session_start();
if (isset($_SESSION['login'])) {
    session_destroy();

    $delete = "DELETE FROM panier";

    $reqDelete = $db->prepare($delete);
    $reqDelete->execute();
}
header('Location: /');
