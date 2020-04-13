<?php
include 'elements/header.php';
include 'elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db = connection();

// Verifie si les champs existent.
if(isset($_POST['mail']) && isset($_POST['mess']) && isset($_POST['adress']) && isset($_POST['adress2']) && isset($_POST['cp']) && isset($_POST['state'])){
    $mail = htmlspecialchars(trim($_POST['mail']));
    $mess = htmlspecialchars(trim($_POST['mess']));
    $adresse = htmlspecialchars(trim($_POST['adress']));
    $adresse2 = htmlspecialchars(trim($_POST['adress2']));
    $code = htmlspecialchars(trim($_POST['cp']));
    $pays = htmlspecialchars(trim($_POST['state']));
}

//verifie si les champs envoyés n'existent pas déjà dans la base de données.

$verif =  " SELECT COUNT(*) as nb
            FROM contact
            INNER JOIN adresse ON contact.adresse_idadresse = adresse.idadresse
            WHERE contact.Email = :email";

$reqVerif = $db->prepare($verif);
$reqVerif->bindParam(':email', $mail);
$reqVerif->execute();

$nb = $reqVerif->fetchObject();

if($nb->nb == 0){
    //On ajoute l'adresse
     $insertAdresse = "INSERT INTO adresse (adresse1,adresse2,codepostal,pays) VALUES (:adresse,:adresse2,:codepostal,:pays)";
    
    $reqInsertAdresse = $db->prepare($insertAdresse);
    $reqInsertAdresse->bindParam(':adresse',$adresse);
    $reqInsertAdresse->bindParam(':adresse2',$adresse2);
    $reqInsertAdresse->bindParam(':codepostal',$code);
    $reqInsertAdresse->bindParam(':pays',$pays);
    $reqInsertAdresse->execute();

    $lastInsertIDAdresse = $db->lastInsertId();

    //Puis le message

    $insertContact = "INSERT INTO contact (Email,messageContact,adresse_idadresse) VALUES (:mail,:message,$lastInsertIDAdresse)";
    $reqInsertMessage = $db->prepare($insertContact);
    $reqInsertMessage->bindParam(':mail', $mail);
    $reqInsertMessage->bindParam(':message', $mess);
    $reqInsertMessage->execute();

    $listeContacts = array();

    while($data = $reqInsertMessage->fetchObject()){
        array_push($listeContacts, $data);
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Contact<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutAgence.php">Ajouter une agence</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutLocation.php">Ajouter une location</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="ajoutClient.php">Ajouter un client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="gerer_les_biens">Gérer les biens</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row"></div>
    <div class="alert alert-danger">
        <?php
            if(empty($_POST['mail'])|| empty($_POST['mess']) || empty($_POST['adress']) || empty($_POST['cp']) || empty($_POST['state'])){
                echo 'Tous les champs doivent être renseignés.';
            } else {
                echo 'Votre formulaire a bien été envoyé.';
            }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6  col-lg-6  col-xl-6">
            <form method ='post' action="contact.php"  class="mt-5">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="mail" class="form-control" id="email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <input type="text" name="mess" class="form-control" id="message">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adress" class="form-control" id="adresse">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="adresse2">Adresse2</label>
                        <input type="text" name="adress2" class="form-control" id="adresse">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="codepostal">Code Postal</label>
                        <input type="text" name="cp" class="form-control" id="codepostal">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="pays">Pays</label>
                        <input type="text" name="state" class="form-control" id="pays">
                    </div>
                </div>
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6  col-lg-6  col-xl-6 mt-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10165.462850644237!2d2.8071097344365343!3d50.434288369956704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd307d659025fd%3A0xb92f8bd91a43659a!2zQ29sbMOoZ2UgSmVhbiBKYXVyw6hz!5e0!3m2!1sfr!2sfr!4v1586439142378!5m2!1sfr!2sfr" width="500" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>
<?php
footer();