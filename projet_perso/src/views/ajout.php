<?php

// Ajouter le jeu dans la base de données 
if (isset($_POST['valider'])) {
    if (empty($_POST['titre']) || empty($_POST['console']) || empty($_POST['prix']) || empty($_POST['image']) || empty($_POST['commentaire'])) {
        echo "Vous devez remplir tous les champs";
    } else {
        if (isset($_POST['titre']) && isset($_POST['console']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_POST['commentaire'])) {
            $titre = htmlspecialchars(trim($_POST['titre']));
            $console = strtoupper(htmlspecialchars(trim($_POST['console'])));
            $prix = intval($_POST['prix']);
            $image = htmlspecialchars(trim($_POST['image']));
            $commentaire = htmlspecialchars(trim($_POST['commentaire']));

            // On insert d'abord la console dans la table correspondante
            // On verifie d'abord si elle n'existe pas déjà dans la table

            $selectCountConsole = "SELECT COUNT(nomConsole) AS nb FROM consoles WHERE nomConsole = :nomConsole";

            $reqCountConsole = $db->prepare($selectCountConsole);
            $reqCountConsole->bindParam(':nomConsole', $console);
            $reqCountConsole->execute();

            $nb = $reqCountConsole->fetchObject();

            // Si $nb est égal à 0 alors on insert la console dans la table
            if ($nb->nb == 0) {
                $insertConsole = "INSERT INTO consoles(nomConsole) VALUES(:console)";

                $reqInsertConsole = $db->prepare($insertConsole);
                $reqInsertConsole->bindParam(':console', $console);
                $reqInsertConsole->execute();

                $lastInsertIdConsole = $db->lastInsertId();

                // Puis on insert le jeu

                $insertJeu = "INSERT INTO jeux (titreJeu,prixJeu,imageJeu,commentaireJeu,dateAjout,users_idUser,consoles_idConsole)
                VALUES(:titre,:prix,:image,:commentaire,NOW(),:idUser,$lastInsertIdConsole)";

                $reqInsertJeu = $db->prepare($insertJeu);
                $reqInsertJeu->bindParam(':titre', $titre);
                $reqInsertJeu->bindParam(':prix', $prix);
                $reqInsertJeu->bindParam(':image', $image);
                $reqInsertJeu->bindParam(':commentaire', $commentaire);
                $reqInsertJeu->bindParam(':idUser', $_SESSION['idUser']);
                $reqInsertJeu->execute();

                echo "Votre jeu a bien été ajouté";
            } else {
                // Sinon on récupère l'id de la console pour l'utiliser dans la requête d'insertion
                $selectConsole = "SELECT idConsole FROM consoles WHERE nomConsole = $console";

                $reqSelectConsole = $db->prepare($selectConsole);
                $reqSelectConsole->execute();

                $data = $reqSelectConsole->fetchObject();

                $idConsole = $data->idConsole;
                var_dump($idConsole);
                die();

                // Puis on insere le jeu 

                $insertGame = "INSERT INTO jeux (titreJeu,prixJeu,imageJeu,commentaireJeu,dateAjout,users_idUser,consoles_idConsole)
                VALUES(:title,:price,:picture,:comment,NOW(),:user,$idConsole)";

                $reqInsertJeu = $db->prepare($insertGame);
                $reqInsertJeu->bindParam(':title', $titre);
                $reqInsertJeu->bindParam(':price', $prix);
                $reqInsertJeu->bindParam(':picture', $image);
                $reqInsertJeu->bindParam(':comment', $commentaire);
                $reqInsertJeu->bindParam(':user', $_SESSION['idUser']);
                $reqInsertJeu->execute();

                echo "Votre jeu a bien été ajouté";
            }
        }
    }
}
?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Formulaire d'inscription</h3>
    <div id="inscription">
        <form method="post" class="offset-md-2 col-md-8">
            <div class="form-group">
                <label class="d-flex justify-content-center" for="title">Titre du jeu</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="titre" id="title">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="console">Console</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="console" id="console">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="price">Prix du Jeu</label>
                <input type="number" class="form-control w-75 d-flex mx-auto rounded-pill" name="prix" id="price">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="picture">Image du jeu</label>
                <input type="file" class="w-75 d-flex mx-auto" name="image" id="picture">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="comment">Commentaire sur le jeu</label>
                <textarea class="form-control d-flex w-75 mx-auto" name="commentaire" id="comment" rows="5"></textarea>
            </div>
            <?php
            btnValider();
            ?>
        </form>
    </div>
</div>