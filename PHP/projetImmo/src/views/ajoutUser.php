<?php
error_reporting(E_ALL &~ E_NOTICE);

session_start();
if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
}else{
    $email = '';
}
include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['role'])){
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mdp = password_hash(htmlspecialchars(trim($_POST['mdp'])), PASSWORD_BCRYPT);
    $role = htmlspecialchars(trim($_POST['role']));

    $insert = "INSERT INTO user (nomUser,prenomUser,emailUser,mdpUser,roleUser)
    SELECT :nom,:prenom,:email,:mdp,:role
    WHERE 
    NOT EXISTS(
        SELECT emailUSer FROM user WHERE emailUser = :email AND mdpUser = :mdp
        );";

    $req = $db->prepare($insert);
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $mdp);
    $req->bindParam(':role', $role);
    $req->execute();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">DamienLocation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ajouter une agence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            <?php
            if ($email === $_SESSION['login']) {
                ?>
                <li class="nav-item">
                    <a href="deconnexion.php" class="nav-link">Deconnexion</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item active">
                <a href="ajoutUser.php" class="nav-link">Ajouter un utilisateur<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <br>
    <h2 class="d-flex justify-content-center">Ajout d'un utilisateur</h2>
    <hr>
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form method="post" action="ajoutUser.php">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input class="form-inline" type="text" name="nom" id="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input class="form-inline" type="text" name='prenom' id="prenom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-inline" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input class="form-inline" type="password" name="mdp" id="mdp">
                </div>
                <div class="form-group">
                    <label for="role">Rôle</label>
                    <input class="form-inline" type="text" name="role" id="role">  
                </div>
                <div class="form-group">
                    <input type="submit" value="Envoyer" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
