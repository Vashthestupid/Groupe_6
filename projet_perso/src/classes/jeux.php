<?php

class Jeux
{
    private $id;
    private $titre;
    private $console;
    private $prix;
    private $image;
    private $commentaire;
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert()
    {
        $insert = "INSERT INTO jeux(titreJeu,consoleJeu,prixJeu,imageJeu,commentaireJeu,dateAjout,users_iduser) VALUES(:titre,:console,:prix,:image,:commentaire,NOW(),:user)";

        $reqInsert = $this->db->prepare($insert);
        $reqInsert->bindParam(':titre', $this->titre);
        $reqInsert->bindParam(':console', $this->console);
        $reqInsert->bindParam(':prix', $this->prix);
        $reqInsert->bindParam(':image', $this->image);
        $reqInsert->bindParam(':commentaire', $this->commentaire);
        $reqInsert->bindParam(':user', $this->idUser);
        $reqInsert->execute();
    }

    public function selectAll()
    {
        $select = "SELECT 
        idJeu,
        titreJeu,
        imageJeu,
        nomUser,
        prenomUser 
        FROM jeux 
        INNER JOIN users ON jeux.users_idUser = users.idUser";

        $result = $this->db->prepare($select);
        $result->execute();

        return $result->fetchAll();
    }


    public function selectJeu()
    {

        $selectJeu = "SELECT titreJeu,
         consoleJeu,
         prixJeu,
         imageJeu,
         commentaireJeu,
         dateAjout,
         users.prenomUser,
         users.nomUser
        FROM jeux
        INNER JOIN users ON jeux.users_idUser = users.idUser
        WHERE idJeu = :id";

        $req = $this->db->prepare($selectJeu);
        $req->bindParam(':id', $this->id);
        $req->execute();

        return $req->fetchAll();
    }



    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = (int) $idUser;


        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = htmlspecialchars(trim($image));

        return $this;
    }

    /**
     * Get the value of commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = htmlspecialchars(trim($commentaire));

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prix = (int) $prix;

        return $this;
    }

    /**
     * Get the value of console
     */
    public function getConsole()
    {
        return $this->console;
    }

    /**
     * Set the value of console
     *
     * @return  self
     */
    public function setConsole($console)
    {
        $this->console = htmlspecialchars(trim($console));

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = htmlspecialchars(trim($titre));

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * Get the value of prenomUser
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * Set the value of prenomUser
     *
     * @return  self
     */
    public function setPrenomUser($prenomUser)
    {
        $this->prenomUser = htmlspecialchars(trim($prenomUser));

        return $this;
    }

    /**
     * Get the value of nomUser
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * Set the value of nomUser
     *
     * @return  self
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = htmlspecialchars(trim($nomUser));

        return $this;
    }
}
