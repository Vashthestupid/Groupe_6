<?php

// Mise en forme du bouton valider
function btnValider()
{
?>
    <input id="btn-valid" class="d-flex justify-content-center mx-auto rounded-pill bg-secondary" type="submit" name="valider" value="">
<?php
}


function formAjoutJeu()
{
    ?>
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
            <small id="nameButton" name="ajouterJeu" class="form-text text-muted d-flex justify-content-center">VALIDER</small>
        </form>
    <?php
}
