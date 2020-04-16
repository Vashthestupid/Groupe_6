<?php
error_reporting(E_ALL & ~ E_NOTICE);

session_start();
if(isset($_SESSION['login'])){
    $email = $_SESSION['login'];
    echo 'Vous êtes déjà connecté';
}else{
    $_SESSION['login'] = $_POST['mail'];
    $email = $_SESSION['login'];
}


include 'src/views/elements/header.php';
include 'src/views/elements/footer.php';
include 'src/config/config.php';
include 'src/models/connect.php';

head();

$db = connection();
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
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="src/views/ajoutAgence.php">Ajouter une agence</a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item ">
                    <a class="nav-link" href="src/views/ajoutLocation.php">Ajouter une location</a>
                </li>
                <?php
            }
            ?>
            <?php
            if ($email === 'mike.myers@gmail.com') {
                ?>
                <li class="nav-item ">
                    <a class="nav-link" href="src/views/ajoutClient.php">Ajouter un client</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item ">
                <a class="nav-link" href="src/views/gerer_les_biens.php">Gérer les biens</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="src/views/connexion.php">Connexion</a>
            </li>
            <?php 
            if($email === 'mike.myers@gmail.com'){
               ?>
               <li class="nav-item">
                   <a href="src/views/deconnexion.php" class="nav-link">Deconnexion</a>
               </li> 
               <?php
            }
            ?>
        </ul>
    </div>
</nav>
<?php
if($email){
    echo '<div class="alert alert-success w-25"><p class="d-flex justify-content-center">Bienvenue ' . $_SESSION['login']. '</p></div>';
}

?>
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
        </div>
    </div>
</div>
<?php
footer();