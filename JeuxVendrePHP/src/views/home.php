<?php

// Nous allons selectionner la totalité des produits présents dans la table jeux
$selectJeux = "SELECT * FROM jeux";

$reqSelectJeux = $db->prepare($selectJeux);
$reqSelectJeux->execute();
?>
<div class="container-fluid">
    <div class="row">
        <?php
        sideBar();
        ?>
        <div class="col-sm-12 col-md-12 col-lg-9 vitrine">
            <div id="toggle2">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h2>Accueil</h2>
            <div class="row">
                <div class="produits">
                    <img src="images/Fire_Emblem_Three_Houses.png" alt="Fire Emblem Three Houses">
                    <p class="titre">
                        Fire Emblem Three Houses
                    </p>
                    <button class="button">Voir plus</button>
                </div>
            </div>
        </div>
    </div>