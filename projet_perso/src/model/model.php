<?php

namespace App\Model;

abstract class Model {

    protected $id;
    public $db;
    protected $erreur;
    protected $search;



    abstract public function insert();
    abstract public function erreur();
    abstract public function delete();
    abstract public function update();

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
     * Get the value of erreur
     */ 
    public function getErreur()
    {
        return $this->erreur;
    }

    /**
     * Set the value of erreur
     *
     * @return  self
     */ 
    public function setErreur($erreur)
    {
        $this->erreur = htmlspecialchars(trim($erreur));

        return $this;
    }

    /**
     * Get the value of search
     */ 
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set the value of search
     *
     * @return  self
     */ 
    public function setSearch($search)
    {
        $this->search = htmlspecialchars(trim($search));

        return $this;
    }
}