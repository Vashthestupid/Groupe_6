<?php
include 'src/views/elements/header.php';
include 'src/views/elements/footer.php';
include 'src/config/config.php';
include 'src/models/connect.php';

head();

$db = connection();

// On verifie si les champs email et mdp existent. Si c'est le cas on lance la requête

if(isset($_POST['email']) && isset($_POST['mdp'])){
    // On selectionne les élements de la table agence
    $selectAgence = "SELECT adresse.idadresse,
    agence.mdpAgence
    FROM agence
    INNER JOIN adresse ON agence.adresse_idadresse =  adresse.idadresse
    WHERE email = :mail";

    $reqSelectAgence = $db->prepare($selectAgence);
    $reqSelectAgence->bindParam(':mail' , $_POST['email']);
    $reqSelectAgence->execute();

    $agences = array();

    while($data = $reqSelectAgence->fetchObject()){
        array_push($agences, $data);
    }
    if(empty($agences)){
        $agenceValide = false;
    } elseif (password_verify($_POST['mdp'], $agences[0]->mdpAgence)){
        $agenceValide = true;
    }

    // Puis ceux de la table client

    $selectClient = "SELECT adresse.idadresse;
    client.mdpClient,
    FROM adresse ON client.adresse_idadresse = adresse.idadresse 
    WHERE email = :mail";

    $reqSelectClient = $db->prepare($selectClient);
    $reqSelectClient->bindParam(':mail', $_POST['email']);
    $reqSelectClient->execute();

    $clients = array();

    while($data = $reqSelectClient->fetchObject()){
        array_push($clients, $data);
    }

    if(empty($clients)){
        $clientValide = false;
    } elseif (password_verify($_POST['mdp'],$clients[0]->mdpClient)){
        $clientValide = true;
    }

    if($agenceValide || $clientValide){
        echo '<div class =" alert alert-success">Connexion réussie</div>';
    } else {
        echo '<div class="alert alert-danger"> La connexion a échouée</div>';
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
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="src/views/location.php">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="src/views/contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="src/views/ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="src/views/ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="src/views/ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="src/views/gerer_les_biens.php">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-xs-5 col-sm-5 col-md-5  col-lg-4  col-xl-4 ">
            <img class="card-img-top" src="public/img/BernardBlier.jpg" alt="Card image cap">
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5  col-lg-5  col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bienvenue sur IMMO-Blier!!</h5>
                    <p class="card-text">Le site de ventes et locations de biens immobiliers de Bernard Blier!</p>

                        <p>"Chez moi on ne vends pas, on ventile!!"</p>
                    <a href="src/views/contact.php" class="btn btn-outline-secondary">Nous contacter</a>
                </div>
            </div>
            <br>
            <div>
                <p>Se connecter</p>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="mail" name="email" class="form-inline">
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de passe</label>
                        <input type="password" class="form-inline" name="mdp" >
                    </div>
                    <input type="submit" value="Connexion" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
footer();