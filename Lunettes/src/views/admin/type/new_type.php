<?php

if(isset($_POST['valider'])){
    $type = htmlspecialchars(trim($_POST['type']));

    $sql = "INSERT INTO type(nomType) VALUES(:type)";

    $req = $db->prepare($sql);
    $req->bindParam(':type', $type);
    $req->execute();

    // header('Location: /admin/type');
    echo '<meta http-equiv="refresh" content="0; url=/"/>';
}

?>
<div id="newTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Créer un nouveau type de produit </h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Nom du type de produit</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="type" id="type">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>