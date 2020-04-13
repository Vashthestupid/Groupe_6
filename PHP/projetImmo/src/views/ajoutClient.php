<?php 

include '../views/elements/header.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['adress']) && isset($_POST['adress2'])
 && isset($_POST['code']) && isset($_POST['state'])){
     $nom = htmlspecialchars(trim($_POST['name']));
     $prenom = htmlspecialchars(trim($_POST['firstname']));
     $email = htmlspecialchars(trim($_POST['mail']));
     $mdp = htmlspecialchars(trim($_POST['mdp']));
     $adresse = htmlspecialchars(trim($_POST['adress']));
     $adresse2 = htmlspecialchars(trim($_POST['adress2']));
     $code = htmlspecialchars(trim($_POST['code']));
     $pays = htmlspecialchars(trim($_POST['state']));
 }

 // On verifie si les champs sont présents dans la base de données

 $verif = " SELECT COUNT(*) as nb
            FROM client
            INNER JOIN adresse ON client.adresse_idadresse = adresse.idadresse
            WHERE client.nomClient = :nameClient";
$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':nameClient', $nom);
$reqVerif->execute();

$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    // On ajoute d'abord l'adresse. 

    $insertAdresse = "INSERT INTO adresse (adresse1,adresse2,codepostal,pays) VALUES (:adress, :adress2, :codePostal,:pays)";

    $reqInsertAdresse = $db->prepare($insertAdresse);
    $reqInsertAdresse->bindParam(':adress', $adresse);
    $reqInsertAdresse->bindParam(':adress2', $adresse2);
    $reqInsertAdresse->bindParam(':codePostal', $code);
    $reqInsertAdresse->bindParam(':pays', $pays);
    $reqInsertAdresse->execute();

    $lastInsertIdAdresse = $db->lastInsertId();

    //Puis le client.
    $insertClient = "INSERT INTO client (nomClient,prenomClient,emailClient,mdpClient,adresse_idadresse) VALUES (:name, :prenom, :mail, :mdp, $lastInsertIdAdresse)";
    
    $reqInsertClient = $db->prepare($insertClient);
    $reqInsertClient->bindParam(':name', $nom);
    $reqInsertClient->bindParam(':prenom', $prenom);
    $reqInsertClient->bindParam(':mail', $email);
    $reqInsertClient->bindParam(':mdp', $mdp);
    $reqInsertClient->execute();

    $listeClients = array();

    while($data = $reqInsertClient->fetchObject()){
        array_push($listeClients, $data);
    }

  
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
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutLocation">Ajouter une location</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Ajouter un client <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens.php">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <div class="alert alert-danger">
        <?php
        // Verifier si les champs sont remplis.
        if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['mail']) || empty($_POST['mdp']) || empty($_POST['adresse'])
            || empty($_POST['adress2']) || empty($_POST['code']) || empty($_POST['state'])){

            echo 'Tous les champs doivent être renseignés.';
        } else {
            echo 'Votre formulaire a bien été envoyé.';
        }
        ?>
    </div>
    <h2>Ajout d'un client</h2>
    <hr>
    <form method="post" action="ajoutClient.php">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-inline" name="name" id="nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-inline" name="firstname" id="prénom">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="mail" class="form-inline" name="mail" id="email">
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" class="form-inline" name="mdp" id="mot_de_passe">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-inline" name="adress" id="adresse">
        </div>
        <div class="form-group">
            <label for="adresse2">Adresse2</label>
            <input type="text" class="form-inline" name="adress2" id="adresse2">
        </div>
        <div class="form-group">
            <label for="codepostal">Code Postal</label>
            <input type="text" class="form-inline" name="code" id="codepostal">
        </div>
        <div class="form-group">
            <label for="pays">Pays</label>
            <input type="text" class="form-inline" name="state" id="pays">
        </div>
        <input type="submit" value="Envoyer">
    </form>
</div>
<?php 
footer();