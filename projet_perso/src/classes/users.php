<?php

class Users
{
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajout d'un utilisateur

    public function insert()
    {
        $insert = "INSERT INTO users(nomUser,prenomUser,mailuser,mdpUser,adresseUser,cpUser,villeUser) VALUES (:nom,:prenom,:mail,:mdp,:adresse,:cp,:ville)";

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
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
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
}
