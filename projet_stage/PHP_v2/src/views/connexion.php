<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();
if (isset($_SESSION['login'])) {
    $mail = $_SESSION['login'];
} else {
    $email = "";
}

// La partie inscription
// On verifie si les champs ne sont pas vides
if (isset($_POST['valider'])) {
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['emailInsc']) || empty($_POST['mdpInsc']) || empty($_POST['mdp2']) || empty($_POST['typeUser']) || empty($_POST['adresse']) || empty($_POST['ville']) || empty($_POST['pays'])) {
        echo '<div class="alert alert-danger">Tous les champs doivent être remplis</div>';
    } else {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['emailInsc']) && isset($_POST['mdpInsc']) && isset($_POST['mdp2']) && isset($_POST['typeUser']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['pays'])) {
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenom = htmlspecialchars(trim($_POST['prenom']));
            $email = htmlspecialchars(trim($_POST['emailInsc']));
            $mdp = htmlspecialchars(trim($_POST['mdpInsc']));
            $mdp2 = htmlspecialchars(trim($_POST['mdp2']));
            $type = htmlspecialchars(trim($_POST['typeUser']));
            $adresse = htmlspecialchars(trim($_POST['adresse']));
            $ville = htmlspecialchars(trim($_POST['ville']));
            $pays = htmlspecialchars(trim($_POST['pays']));


            if ($mdp === $mdp2) {
                $mdp_hash = password_hash(htmlspecialchars(trim($mdp)), PASSWORD_BCRYPT);

                // On commence les insertions
                // On verifie d'abord si ce que l'on s'apprête à enregistrer n'existe pas déjà dans la BDD.

                $selectUserExiste = "SELECT COUNT(mailUser) as nb
				FROM users 
				WHERE users.mailUser = :mailUser";

                $reqSelectUserExiste = $db->prepare($selectUserExiste);
                $reqSelectUserExiste->bindParam(':mailUser', $email);
                $reqSelectUserExiste->execute();

                $nb = $reqSelectUserExiste->fetchObject();

                // si le résultat est de 0 alors on insère les données
                if ($nb->nb == 0) {
                    // On ajoute l'utilisateur dans la base de données

                    $insertUser = "INSERT INTO users(nomUser,prenomUser,mailUser,mdpUser,user_type,adresseUser,ville,pays) VALUES(:nom,:prenom,:mail,:mdp,:type,:adresse,:ville,:pays)";

                    $reqInsertUser = $db->prepare($insertUser);
                    $reqInsertUser->bindParam(':nom', $nom);
                    $reqInsertUser->bindParam(':prenom', $prenom);
                    $reqInsertUser->bindParam(':mail', $email);
                    $reqInsertUser->bindParam(':mdp', $mdp_hash);
                    $reqInsertUser->bindParam(':type', $type);
                    $reqInsertUser->bindParam(':adresse', $adresse);
                    $reqInsertUser->bindParam(':ville', $ville);
                    $reqInsertUser->bindParam(':pays', $pays);
                    $reqInsertUser->execute();

                    echo '<div class="alert alert-success">Votre formulaire a bien été enregistré</div>';
                } else {
                    echo '<div class="alert alert-danger">L\'utilisateur existe déjà dans notre base de données</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Les deux mots de passe ne sont pas identiques</div>';
            }
        }
    }
}
?>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <button id="btnInscription" type="button" class="btn btn-secondary mr-3">Inscription</button>
        <button id="btnConnexion" type="button" class="btn btn-secondary">Connexion</button>
    </div>
    <br>
    <div id="connexion" class="offset-md-2 col-md-8">

        <h2 class=" titleForm d-flex justify-content-center">Formulaire de connexion</h2>
        <form action="../../index.php" method="post" id="formConnexion">
            <div class="form-group">
                <label for="email" class="d-flex justify-content-center">Email</label>
                <input class="form-inline d-flex mx-auto w-75" type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="mdp" class="d-flex justify-content-center">Mot de passe</label>
                <input class="form-inline d-flex mx-auto w-75" type="password" name="mdp" id="mdp">
            </div>
            <input type="submit" name="login" value="Valider" class="btn btn-success d-flex mx-auto">
        </form>
    </div>
    <div id="inscription">
        <h2 class=" titleForm d-flex justify-content-center">Formulaire d'inscription</h2>
        <form method="post" class="offset-md-2 col-md-8">
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
                <label for="mdp2" class="d-flex justify-content-center">Confirmation du mot de passe </label>
                <input class="form-inline d-flex mx-auto w-75" type="password" name="mdp2" id="mdp2">
            </div>
            <div class="form-group">
                <label for="typeUser" class="d-flex justify-content-center">Type d'utilisateur</label>
                <select class="form-control w-75 d-flex mx-auto" name="typeUser" id="typeUser">
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adresse" class="d-flex justify-content-center">Adresse</label>
                <input class="form-inline d-flex mx-auto w-75" type="text" name="adresse" id="adresse">
            </div>
            <div class="form-group">
                <label for="ville" class="d-flex justify-content-center">Ville</label>
                <input class="form-inline d-flex mx-auto w-75" type="text" name="ville" id="ville">
            </div>
            <div class="form-group">
                <label for="pays" class="d-flex justify-content-center">Pays</label>
                <input class="form-inline d-flex mx-auto w-75" type="text" name="pays" id="pays">
            </div>
            <input type="submit" name="valider" value="Valider" class="btn btn-success d-flex mx-auto">
        </form>
    </div>
</div>

