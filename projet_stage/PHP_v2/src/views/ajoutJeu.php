<?php

// Si le bouton valider ets cliqué et qu'il existe
if (isset($_POST['valider'])) {
    // Si les champs envoyés sont vide
    // alors on affiche un message d'erreur
    if (empty($_POST['titre']) || empty($_POST['studio']) || empty($_POST['resume']) || empty($_POST['genre']) || empty($_POST['prix']) || empty($_POST['nbre']) || empty($_POST['online']) || empty($_POST['image'])) {
        echo '<div class="alert alert-danger">Vous devez renseigner tous les champs demandés</div>';
    } else {
        if (isset($_POST['titre']) && isset($_POST['studio']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['prix']) && isset($_POST['nbre']) && isset($_POST['online']) && isset($_POST['image'])) {
            $titre = htmlspecialchars(trim($_POST['titre']));
            $studio = htmlspecialchars(trim($_POST['studio']));
            $resume = htmlspecialchars(trim($_POST['resume']));
            $genre = htmlspecialchars(trim($_POST['genre']));
            $prix = intval($_POST['prix']);
            $nbre = intval($_POST['nbre']);
            $online = htmlspecialchars(trim($_POST['online']));
            $image = htmlspecialchars(trim($_POST['image']));

            // On verifie si le produit n'est pas déjà présent dans la base de données

            $selectExist = "SELECT COUNT(titreJeu) AS nb
			FROM jeux
			WHERE jeux.titreJeu = :titreJeu";

            $reqSelectExist = $db->prepare($selectExist);
            $reqSelectExist->bindParam('titreJeu', $titre);
            $reqSelectExist->execute();

            $nb = $reqSelectExist->fetchObject();

            // Si le résultat est égal à 0 alors on insére le produit. Sinon on affiche un message d'erreur

            if ($nb->nb == 0) {
                $insertJeu = "INSERT INTO jeux (titreJeu,studioJeu,resumeJeu,prixJeu,nombreJoueurMax,onlineJeu,imageJeu,genreJeu,dateAjout) VALUES(:titre,:studio,:resume,:prix,:nbre,:online,:image,:genre, NOW())";

                $reqInsertJeu = $db->prepare($insertJeu);
                $reqInsertJeu->bindParam(':titre', $titre);
                $reqInsertJeu->bindParam(':studio', $studio);
                $reqInsertJeu->bindParam(':resume', $resume);
                $reqInsertJeu->bindParam(':prix', $prix);
                $reqInsertJeu->bindParam(':nbre', $nbre);
                $reqInsertJeu->bindParam(':online', $online);
                $reqInsertJeu->bindParam(':image', $image);
                $reqInsertJeu->bindParam(':genre', $genre);
                $reqInsertJeu->execute();

                echo '<div class="alert alert-success">Votre produit a bien été ajouté</div>';
            } else {
                echo '<div class="alert alert-danger">Le produit existe déjà dans la base de données</div>';
            }
        }
    }
}

?>
<br>
<div class="container">
    <br>
    <h2 class="titleForm d-flex justify-content-center">Formulaire d'ajout d'un Jeu</h2>
    <div id="ajoutJeu">
        <?php
        formulaireJeux();
        ?>
    </div>
</div>
