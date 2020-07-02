<?php

use App\Model\Jeux;
// var_dump($_SESSION['idUser']);
$jeu = new Jeux($db);

if(isset($_POST['valider'])){
    if(empty($_POST['titre']) || empty($_POST['console']) || empty($_POST['prix']) || empty($_POST['image']) || empty($_POST['commentaire'])){
        echo "Vous devez renseigner tous les champs";
    } else {
        if(isset($_POST['titre']) && isset($_POST['console']) && isset($_POST['prix']) && isset($_POST['image']) && isset($_POST['commentaire'])){           
            $jeu->setTitre($_POST['titre']);
            $jeu->setConsole($_POST['console']);
            $jeu->setPrix($_POST['prix']);
            $jeu->setImage($_POST['image']);
            $jeu->setCommentaire($_POST['commentaire']);
            $jeu->setId($_SESSION['idUser']);
            $jeu->insert();
            echo "Votre jeu a bien été ajouté";
        }
    }
}
?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Ajouter un jeu</h3>
    <div id="insertGame">
        <form id="ajoutJeu" method="post" class="offset-md-2 col-md-8">
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
            <small id="nameButton" name="ajouterJeu" class="form-text text-muted d-flex justify-content-center">VALIDER</small>
        </form>
    </div>
</div>