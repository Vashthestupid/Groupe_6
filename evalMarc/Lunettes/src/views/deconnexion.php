<?php

if (isset($_SESSION['login'])) {

    // Suppression du panier à chaque deconnexion
    $delete = "DELETE FROM panier
    WHERE panier.user_id = :user";

    $reqDelete = $db->prepare($delete);
    $reqDelete->bindParam(':user', $_SESSION['user']);
    $reqDelete->execute();
    
    session_destroy();
}

// header('Location: /');

echo '<meta http-equiv="refresh" content="0;url=/"/>';
