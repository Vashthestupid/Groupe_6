<?php

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

?>
<h2>Ajouter un produit</h2>
<hr>
<div>
    <form method="post" action="addTraitement.php">
        <div class="form-group row">	
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="name" id="nom">
        </div>
        <div class="form-group row">	
            <label for="description">Description</label>
            <input type="text" class="form-control" name="describe" id="description">
        </div>
        <div class="form-group row">	
            <label for="prix">Prix</label>
            <input type="number" class="form-control" name="price" id="prix">
        </div>
        <div class="form-group row">	
            <label for="categorie">Sélectionnez une catégorie</label>
            <select name="cat" id="categorie" class="form-control">
                <option value="1">Fashion</option>
                <option value="2" >Electronics</option>
                <option value="3" >Motors</option>
            </select>
        </div>
        <input class="btn btn-dark" type="submit" value="Envoyer">
    </form>
</div>
