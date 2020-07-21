<?php

if(isset($_POST['valider'])){
    if(!empty($_POST['status'])){
        $status = htmlspecialchars(trim($_POST['status']));

        $sql = "INSERT INTO status(nomStatus) VALUES(:status)";

        $req = $db->prepare($sql);
        $req->bindParam(':status', $status);
        $req->execute();

        // header('Location: /admin/status');
        echo '<meta http-equiv="refresh" content="0; url=/admin/status"/>';
    }
}

?>
<div id="newTypeUser" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Créer un nouveau status</h2>
    <form method="post" class="mt-5">
        <div class="form-group">
            <label for="nomStatus" class="d-flex justify-content-center">Nom du status</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="status" id="status">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>
