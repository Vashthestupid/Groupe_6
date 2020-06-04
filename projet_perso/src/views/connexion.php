<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Formulaire de connexion</h3>
    <div id="inscription">
        <form action="../../index.php" method="post" class="offset-md-2 col-md-8 mt-5">
            <div class="form-group">
                <label class="d-flex justify-content-center" for="email">Adresse E-mail</label>
                <input type="email" class="form-control w-75 d-flex mx-auto rounded-pill" name="mail" id="email">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="mot_de_passe">Mot de passe</label>
                <input type="password" class="form-control w-75 d-flex mx-auto rounded-pill" name="mdp" id="mot_de_passe">
            </div>
            <?php
            btnValider();
            ?>
        </form>
    </div>
</div>