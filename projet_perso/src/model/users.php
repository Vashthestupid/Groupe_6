<?php

namespace App\Model;

class Users extends Model
{
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;


    public function  __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = htmlspecialchars(trim($nom));

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = htmlspecialchars(trim($prenom));

        return $this;
    }

    /**
     * Get the value of mailuser
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mailuser
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = htmlspecialchars(trim($mail));

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */
    public function setMdp($mdp)
    {
        $this->mdp = password_hash(htmlspecialchars(trim($mdp)), PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = htmlspecialchars(trim($adresse));

        return $this;
    }

    /**
     * Get the value of cp
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */
    public function setCp($cp)
    {
        $this->cp = htmlspecialchars(trim($cp));

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = htmlspecialchars(trim($ville));

        return $this;
    }



    //FONCTION

    public function insert()
    {

        $insert = "INSERT INTO users(nomUser,prenomUser,mailuser,mdpUser,adresseUser,cpUser,villeUser) 
        VALUES (:nom,:prenom,:mail,:mdp,:adresse,:cp,:ville)";

        $req = $this->db->prepare($insert);
        $req->bindParam(':nom', $this->nom);
        $req->bindParam(':prenom', $this->prenom);
        $req->bindParam(':mail', $this->mail);
        $req->bindParam(':mdp', $this->mdp);
        $req->bindParam(':adresse', $this->adresse);
        $req->bindParam(':cp', $this->cp);
        $req->bindParam(':ville', $this->ville);
        $req->execute();
    }

    public function connexion()
    {
        $mail = $this->mail;

        $select = "SELECT * FROM users WHERE mailUser = :mail";

        $req = $this->db->prepare($select);
        $req->bindParam(':mail', $mail);
        $req->execute();

        return $req->fetchObject();


        //
    }

    public function erreur()
    {
        echo '<div class="alert alert-danger mt-3">' . $this->erreur . '</div>';
    }

    public function selectUserGet()
    {
        $select = "SELECT nomUser,
        prenomUser,
        mailUser,
        adresseUser,
        cpUser,
        villeUser
        FROM users
        WHERE nomUser = :nom AND prenomUser = :prenom ";

        $req = $this->db->prepare($select);
        $req->bindParam(':nom', $this->nom);
        $req->bindParam(':prenom', $this->prenom);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function selectJeuxVendeur(){
        $select = "SELECT titreJeu,
        prixJeu,
        consoleJeu
        FROM jeux
        INNER JOIN users ON jeux.users_id = users.id
        WHERE nomUser = :nom AND prenomUser = :prenom";

        $req = $this->db->prepare($select);
        $req->bindParam(':nom', $this->nom);
        $req->bindParam(':prenom', $this->prenom);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function selectUserSession()
    {
        $select = "SELECT users.id,
        nomUser,
        prenomUser,
        mailUser,
        mdpUser,
        adresseUser,
        cpUser,
        villeUser
        FROM users
        WHERE users.id = :id";

        $req = $this->db->prepare($select);
        $req->bindParam(':id', $this->id);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function selectJeuxUser()
    {
        $select = "SELECT jeux.id, 
        titreJeu,
        prixJeu
        FROM jeux 
        WHERE jeux.users_id = :id";

        $req = $this->db->prepare($select);
        $req->bindParam(':id', $this->id);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function delete()
    {
    }

    public function update()
    {
        $update = "UPDATE users
        SET nomUser = :nom,
        prenomUser = :prenom,
        mailUser = :mail,
        mdpUser = :mdp,
        adresseUser = :adresse,
        cpUser = :cp,
        villeUser = :ville
        WHERE users.id = :id";

        $req = $this->db->prepare($update);
        $req->bindParam(':nom', $this->nom);
        $req->bindParam(':prenom', $this->prenom);
        $req->bindParam(':mail', $this->mail);
        $req->bindParam(':mdp', $this->mdp);
        $req->bindParam(':adresse', $this->adresse);
        $req->bindParam(':cp', $this->cp);
        $req->bindParam(':ville', $this->ville);
        $req->bindParam(':id', $this->id);
        $req->execute();

        session_destroy();
    }
}
