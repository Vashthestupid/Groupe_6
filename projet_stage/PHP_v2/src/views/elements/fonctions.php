<?php

// Fonction destinée aux formulaires d'ajout et de modificatin d'un livre
function formulaireLivre()
{
?>
    <form method="post" class="offset-md-2 col-md-8">
        <div class="form-group">
            <label for="titre" class="d-flex justify-content-center">Titre du livre</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titre">
        </div>
        <div class="form-group">
            <label for="auteur" class="d-flex justify-content-center">Auteur du livre</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="auteur" id="auteur">
        </div>
        <div class="form-group">
            <label for="resume" class="d-flex justify-content-center">Résumé</label>
            <textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resume"></textarea>
        </div>
        <div class="form-group">
            <label for="genre" class="d-flex justify-content-center">Genre</label>
            <select class="d-flex mx-auto w-75" name="genre" id="genre">
                <option value="Romance">Romance</option>
                <option value="Science-Fiction">Science-Fiction</option>
                <option value="Aventure">Aventure</option>
                <option value="Fantastique">Fantastique</option>
                <option value="Policier">Policier</option>
                <option value="Anticipation">Anticipation</option>
                <option value="Bande Dessinée">Bande Déssinée</option>
                <option value="Manga">Manga</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prix" class="d-flex justify-content-center">Prix du livre</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix">
        </div>
        <div class="form-group">
            <label for="image" class="d-flex justify-content-center">Image du livre</label>
            <input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="image">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
    </form>
<?php
}

// Fonction destinée aux formulaires d'ajout et de modificatin d'un film
function formulaireFilm()
{
?>
    <form id="formFilm" method="post" class="offset-md-2 col-md-8">
        <div class="form-group">
            <label for="titre" class="d-flex justify-content-center">Titre du Film</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titrefilm">
        </div>
        <div class="form-group">
            <label for="realisateur" class="d-flex justify-content-center">Réalisateur du film</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="realisateur" id="réalisateur">
        </div>
        <div class="form-group">
            <label for="resume" class="d-flex justify-content-center">Résumé du film</label>
            <textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resumeFilm"></textarea>
        </div>
        <div class="form-group">
            <label for="genre" class="d-flex justify-content-center">Genre</label>
            <select class="d-flex mx-auto w-75" name="genre" id="genreFilm">
                <option value="Romance">Romance</option>
                <option value="Science-Fiction">Science-Fiction</option>
                <option value="Aventure">Aventure</option>
                <option value="Fantastique">Fantastique</option>
                <option value="Policier">Policier</option>
                <option value="Anticipation">Anticipation</option>
                <option value="Comédie">Comédie</option>
                <option value="Horreur">Horreur</option>
                <option value="Epouvante">Epouvante</option>
                <option value="animation">Animation</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prix" class="d-flex justify-content-center">Prix du film</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prixFilm">
        </div>
        <div class="form-group">
            <label for="image" class="d-flex justify-content-center">Image du film</label>
            <input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="imageFilm">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
    </form>
<?php
}

// Fonction destinée aux formulaires d'ajout et de modificatin d'un jeu
function formulaireJeux()
{
?>
    <form method="post" class="offset-md-2 col-md-8">
        <div class="form-group">
            <label for="titre" class="d-flex justify-content-center">Titre du jeu</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="titre" id="titre">
        </div>
        <div class="form-group">
            <label for="studio" class="d-flex justify-content-center">Studio de developpement</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="studio" id="studio">
        </div>
        <div class="form-group">
            <label for="resume" class="d-flex justify-content-center">Résumé du jeu</label>
            <textarea class="form-inline d-flex mx-auto w-75" name="resume" id="resume"></textarea>
        </div>
        <div class="form-group">
            <label for="genre" class="d-flex justify-content-center">Genre</label>
            <select class="d-flex mx-auto w-75" name="genre" id="genre">
                <option value="Aventure">Aventure</option>
                <option value="Science-Fiction">Science-Fiction</option>
                <option value="Guerre">Guerre</option>
                <option value="Course">Course</option>
                <option value="FPS">First Person Shooter</option>
                <option value="RPG">Role Playing Game</option>
                <option value="Sport">Sport</option>
                <option value="Plate-forme">Plate-forme</option>
                <option value="Gestion">Gestion</option>
                <option value="Jeux de société">Jeux de société</option>
                <option value="Combat">Combat</option>
                <option value="Simulation">Simulation</option>
                <option value="MMO">Massively Multiplayer Online</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prix" class="d-flex justify-content-center">Prix du jeu</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="prix" id="prix">
        </div>
        <div class="form-group">
            <label for="nbre" class="d-flex justify-content-center">Nombre de joueurs maximum</label>
            <input class="form-inline d-flex mx-auto w-75" type="number" name="nbre" id="nbre">
        </div>
        <div class="form-group">
            <label for="online" class="d-flex justify-content-center">Jeux online</label>
            <div class="checkbox d-flex justify-content-center">
                <p class="mr-2">Oui</p>
                <input class="mt-2 mr-2" type="radio" name="online" id="online" value="Oui">
                <p class="ml-2 mr-2">Non</p>
                <input class="mt-2" type="radio" name="online" id="online" value="Non">
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="d-flex justify-content-center">Image du jeu</label>
            <input class="form-inline d-flex mx-auto w-75" type="file" name="image" id="image">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
    </form>
<?php
}
