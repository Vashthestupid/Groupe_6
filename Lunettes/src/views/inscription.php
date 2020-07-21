<?php

if (isset($_POST['valider'])) {
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['emailInsc']) || empty($_POST['mdpInsc']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville'])) {
        echo '<div class="alert alert-danger">Tous les champs doivent être remplis</div>';
    } else {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emailInsc']) && isset($_POST['mdpInsc']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenom = htmlspecialchars(trim($_POST['prenom']));
            $email = htmlspecialchars(trim($_POST['emailInsc']));
            $mdp = password_hash(htmlspecialchars(trim($_POST['mdpInsc'])), PASSWORD_BCRYPT);
            $adresse = htmlspecialchars(trim($_POST['adresse']));
            $cp = htmlspecialchars(trim($_POST['cp']));
            $ville = htmlspecialchars(trim($_POST['ville']));


            // On commence les insertions
            // On verifie d'abord si ce que l'on s'apprête à enregistrer n'existe pas déjà dans la BDD.

            $selectUserExiste = "SELECT COUNT(mailUser) as nb
				FROM user 
				WHERE user.mailUser = :mailUser";

            $reqSelectUserExiste = $db->prepare($selectUserExiste);
            $reqSelectUserExiste->bindParam(':mailUser', $email);
            $reqSelectUserExiste->execute();

            $nb = $reqSelectUserExiste->fetchObject();

            // si le résultat est de 0 alors on insère les données
            if ($nb->nb == 0) {
                // On ajoute l'utilisateur dans la base de données

                $insertUser = "INSERT INTO user(nomUser,prenomUser,mailUser,mdpUser,adresseUser,cpUser,villeUser) VALUES(:nom,:prenom,:mail,:mdp,:adresse,:cp,:ville)";

                $reqInsertUser = $db->prepare($insertUser);
                $reqInsertUser->bindParam(':nom', $nom);
                $reqInsertUser->bindParam(':prenom', $prenom);
                $reqInsertUser->bindParam(':mail', $email);
                $reqInsertUser->bindParam(':mdp', $mdp);
                $reqInsertUser->bindParam(':adresse', $adresse);
                $reqInsertUser->bindParam(':cp', $cp);
                $reqInsertUser->bindParam(':ville', $ville);
                $reqInsertUser->execute();

                echo '<div class="alert alert-success">Votre formulaire a bien été enregistré</div>';
            } else {
                echo '<div class="alert alert-danger">L\'utilisateur existe déjà dans notre base de données</div>';
            }
        }
    }
}

?>
<div class="d-flex justify-content-center mt-5">
    <button id="btnInscription" type="button" class="btn btn-sm btn-secondary mr-3">Inscription</button>
    <button id="btnConnexion" type="button" class="btn btn-sm btn-secondary">Connexion</button>
</div>
<br>

<div id="connexion" class="offset-md-2 col-md-8">
    <h2 class=" titleForm d-flex justify-content-center">Formulaire de connexion</h2>
    <form action="index.php" action-xhr="index.php" method='post' id="formConnexion" class="mt-5">
        <div class="form-group">
            <label for="email" class="d-flex justify-content-center">Email</label>
            <input class="form-inline d-flex mx-auto w-75" type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
            <input class="form-inline d-flex mx-auto w-75" type="password" name="mdp" id="mdp">
        </div>
        <input type="submit" name="login" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>

<div id="inscription">
    <h2 class=" titleForm d-flex justify-content-center">Formulaire d'inscription</h2>
    <form method="post" class="offset-md-2 col-md-8 mt-5">
        <div class="form-group">
            <label for="nom" class="d-flex justify-content-center">Nom</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="nom" id="nom">
        </div>
        <div class="form-group">
            <label for="prenom" class="d-flex justify-content-center">Prenom</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="prenom" id="prenom">
        </div>
        <div class="form-group">
            <label for="email" class="d-flex justify-content-center">Email</label>
            <input class="form-inline d-flex mx-auto w-75" type="email" name="emailInsc" id="emailInsc">
        </div>
        <div class="form-group">
            <label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
            <input class="form-inline d-flex mx-auto w-75" type="password" name="mdpInsc" id="mdpInsc">
        </div>
        <div class="form-group">
            <label for="adresse" class="d-flex justify-content-center">Adresse</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse">
        </div>
        <div class="form-group">
            <label for="cp" class="d-flex justify-content-center">Code Postal</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="cp" id="cp">
        </div>
        <div class="form-group">
            <label for="ville" class="d-flex justify-content-center">Ville</label>
            <input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville">
        </div>
        <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto w-75">
    </form>
</div>