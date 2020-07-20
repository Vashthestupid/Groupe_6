<?php

if(isset($_POST['valider'])){
    if(!empty($_POST['typeUser'])){
        $typeUser = htmlspecialchars(trim($_POST['typeUser']));

        $sql = "INSERT INTO type_user(nomType) VALUES(:type)";

        $req = $db->prepare($sql);
        $req->bindParam(':type', $typeUser);
        $req->execute();

        header('Location: /admin/typeUser');
    }
}

?>
<div id="newTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Créer un nouveau type</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomType" class="d-flex justify-content-center">Nom du type d'utilisateur</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="typeUser" id="typeUser">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>
