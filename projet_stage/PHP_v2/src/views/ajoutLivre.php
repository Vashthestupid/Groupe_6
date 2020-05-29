<?php

// Si le bouton valider ets cliqué et qu'il existe
if (isset($_POST['valider'])) {
    // Si les champs envoyés sont vide
    // alors on affiche un message d'erreur
    if (empty($_POST['titre']) || empty($_POST['auteur']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['image'])) {
        echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
    } else {
        if (isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['image'])) {
            $titre = htmlspecialchars(trim($_POST['titre']));
            $auteur = htmlspecialchars(trim($_POST['auteur']));
            $resume = htmlspecialchars(trim($_POST['resume']));
            $genre = htmlspecialchars(trim($_POST['genre']));
            $prix = intval($_POST['prix']);
            $image = htmlspecialchars(trim($_POST['image']));

            // On verifie si le genre n'existe pas déjà
            $selectExist = "SELECT COUNT(titreLivre) AS nb FROM livres WHERE titreLivre = :titreLivre";
            $reqSelectExist = $db->prepare($selectExist);
            $reqSelectExist->bindParam(':titreLivre', $titre);
            $reqSelectExist->execute();

            //var_dump($reqSelectExist);
            $nb = $reqSelectExist->fetchObject();

            if ($nb->nb == 0) {
                // Une fois que l'on a verifié si le genre existe, on ajoute le livre

                $insertLivre = "INSERT INTO livres (titreLivre,auteurLivre,resumeLivre,prixLivre,imageLivre,genreLivre,dateAjout) VALUES (:titre,:auteur,:resume,:prix,:image,:genre, NOW())";
                $reqInsertLivre = $db->prepare($insertLivre);
                $reqInsertLivre->bindParam(':titre', $titre);
                $reqInsertLivre->bindParam(':auteur', $auteur);
                $reqInsertLivre->bindParam(':resume', $resume);
                $reqInsertLivre->bindParam(':prix', $prix);
                $reqInsertLivre->bindParam(':image', $image);
                $reqInsertLivre->bindParam(':genre', $genre);
                $reqInsertLivre->execute();

                echo '<div class="alert alert-success">Votre produit à bien été ajouté</div>';
            } else {
                echo '<div class="alert alert-danger">Le produit existe déjà dans notre base de données</div>';
            }
        }
    }
}


?>
<br>
<div class="container">
    <br>
    <h2 class="titleForm d-flex justify-content-center">Formulaire d'ajout d'un livre</h2>
    <div id="ajoutLivre">
        <?php
        formulaireLivre();
        ?>
    </div>
</div>

