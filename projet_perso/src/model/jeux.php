<?php

namespace App\Model;


class Jeux extends Model
{
    private $titre;
    private $console;
    private $prix;
    private $image;
    private $commentaire;


    public function __construct($db)
    {
        $this->db = $db;
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
        $this->console = strtoupper(htmlspecialchars(trim($console)));

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

    // FONCTIONS

    public function insert()
    {

        $insert = "INSERT INTO jeux(titreJeu,consoleJeu,prixJeu,imageJeu,commentaireJeu,dateAjout,users_id) 
        VALUES(:titre,:console,:prix,:image,:commentaire,NOW(),:id)";

        $req = $this->db->prepare($insert);
        $req->bindParam(':titre', $this->titre);
        $req->bindParam(':console', $this->console);
        $req->bindParam(':prix', $this->prix);
        $req->bindParam(':image', $this->image);
        $req->bindParam(':commentaire', $this->commentaire);
        $req->bindParam(':id', $this->id);
        $req->execute();

        // $req->debugDumpParams();
    }

    public function selectAll()
    {
        $select = "SELECT jeux.id AS id, 
        titreJeu,
        imageJeu,
        prenomUser,
        nomUser
        FROM jeux
        INNER JOIN users ON jeux.users_id = users.id
        ORDER BY jeux.id
        DESC ";

        $req = $this->db->prepare($select);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function selectJeu()
    {
        $select = "SELECT jeux.id, 
        titreJeu,
        consoleJeu,
        prixJeu,
        imageJeu,
        commentaireJeu,
        dateAjout,
        nomUser,
        prenomUser
        FROM jeux
        INNER JOIN users ON jeux.users_id = users.id
        WHERE jeux.id = :id";

        $req = $this->db->prepare($select);
        $req->bindParam(':id', $this->id);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }

    public function erreur()
    {
        return $this->erreur;
    }

    public function delete()
    {
        $delete = "DELETE FROM jeux 
        WHERE jeux.id = :id";

        $req = $this->db->prepare($delete);
        $req->bindparam(':id', $this->id);
        $req->execute();

        header('Location: Ma_Page');
        // echo '<meta http-equiv="refresh" content="0; url=Ma_Page"  />';
    }

    public function update()
    {
        $update = "UPDATE jeux
        SET titreJeu = :titre,
        consoleJeu = :console,
        prixJeu = :prix,
        imageJeu = :image,
        commentaireJeu = :commentaire,
        dateModif = NOW()
        WHERE jeux.id = :id ";

        $req = $this->db->prepare($update);
        $req->bindParam(':titre', $this->titre);
        $req->bindParam(':console', $this->console);
        $req->bindParam(':prix', $this->prix);
        $req->bindParam(':image', $this->image);
        $req->bindParam(':commentaire', $this->commentaire);
        $req->bindParam(':id', $this->id);
        $req->execute();
    }

    public function recherche()
    {
        $select = "SELECT jeux.id,
        titreJeu, 
        imageJeu,
        prenomUser,
        nomUser
        FROM jeux
        INNER JOIN users ON jeux.users_id = users.id
        WHERE titreJeu LIKE '%$this->search%'";

        $req = $this->db->prepare($select);
        $req->execute();

        $data = $req->fetchAll();

        return $data;
    }
}
