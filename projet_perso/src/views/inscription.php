<?php

var_dump($db);

$users = new Users($db);

if (isset($_POST['valider'])) { 
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
        $users->setNom($_POST['nom']);
        $users->setPrenom($_POST['prenom']);
        $users->setMail($_POST['mail']);
        $users->setMdp($_POST['mdp']);
        $users->setAdresse($_POST['adresse']);
        $users->setCp($_POST['cp']);
        $users->setVille($_POST['ville']);
        $users->insert();
    } else {
        echo 'Un problème est survenu';
    }
} else {
    echo "Un problème est survenu";
}
// inscription de l'utilisateur
// if (isset($_POST['valider'])) {
//     if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp']) || empty($_POST['mdp2']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['ville'])) {
//         echo "Vous devez renseigner tous les champs";
//     } else {
//         if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])) {
//             $nom = htmlspecialchars(trim($_POST['nom']));
//             $prenom = htmlspecialchars(trim($_POST['prenom']));
//             $mail = htmlspecialchars(trim($_POST['mail']));
//             $mdp = htmlspecialchars(trim($_POST['mdp']));
//             $mdp2 = htmlspecialchars(trim($_POST['mdp2']));
//             $adresse = htmlspecialchars(trim($_POST['adresse']));
//             $cp = htmlspecialchars(trim($_POST['cp']));
//             $ville = htmlspecialchars(trim($_POST['ville']));

//             // on verifie si les mots de passe sont identiques
//             if ($mdp2 === $mdp) {
//                 //"mdp3" sera la version finale du mot de passe. Il aura subi un hachage
//                 $mdp3 = password_hash(htmlspecialchars(trim($_POST['mdp'])), PASSWORD_BCRYPT);

//                 // on verifie si l'adresse email n'est pas déjà utilisée
//                 $selectVerifExiste = "SELECT COUNT(mailUser) as nb FROM users WHERE users.mailUser = :mailUser";

//                 $reqSelectVerif = $db->prepare($selectVerifExiste);
//                 $reqSelectVerif->bindParam(':mailUser', $mail);
//                 $reqSelectVerif->execute();

//                 $nb = $reqSelectVerif->fetchObject();

//                 // si le resultat est égal à 0 alors on insert l'utilisateur
//                 if ($nb->nb == 0) {
//                     $insertUser = "INSERT INTO users(nomUser,prenomUser,mailUser,mdpUser,adresseuser,cpUser,villeUser) VALUES(:nom,:prenom,:mail,:mdp,:adresse,:cp,:ville)";

//                     $reqInsert = $db->prepare($insertUser);
//                     $reqInsert->bindParam(':nom', $nom);
//                     $reqInsert->bindParam(':prenom', $prenom);
//                     $reqInsert->bindParam(':mail', $mail);
//                     $reqInsert->bindParam(':mdp', $mdp3);
//                     $reqInsert->bindParam(':adresse', $adresse);
//                     $reqInsert->bindParam(':cp', $cp);
//                     $reqInsert->bindParam(':ville', $ville);
//                     $reqInsert->execute();

//                     // et on affiche une message de validation
//                     echo "Votre inscription à bien été effectuée";
//                 } else {
//                     // sinon on affiche un message d'erreur
//                     echo "L'adresse email est déjà utilisée";
//                 }
//             } else {
//                 echo "Les mots de passe ne sont pas identiques !";
//             }
//         } else {
//             echo "Vous devez renseigner tous les champs";
//         }
//     }
// }


?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-5 ">Formulaire d'inscription</h3>
    <div id="inscription">
        <form method="post" class="offset-md-2 col-md-8">
            <div class="form-group">
                <label class="d-flex justify-content-center" for="name">Nom</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="nom" id="name">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="firstname">Prénom</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="prenom" id="firstname">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="email">Adresse E-mail</label>
                <input type="email" class="form-control w-75 d-flex mx-auto rounded-pill" name="mail" id="email">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="mot_de_passe">Mot de passe</label>
                <input type="password" class="form-control w-75 d-flex mx-auto rounded-pill" name="mdp" id="mot_de_passe">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="adresse">Adresse Postale</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="adresse" id="adresse">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="code_postal">Code Postal</label>
                <input type="number" class="form-control w-75 d-flex mx-auto rounded-pill" name="cp" id="code_postal">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-center" for="ville">Ville</label>
                <input type="text" class="form-control w-75 d-flex mx-auto rounded-pill" name="ville" id="ville">
            </div>
            <?php
            btnValider();
            ?>
        </form>
    </div>
</div>