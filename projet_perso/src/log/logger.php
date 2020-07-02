<?php

namespace App\Log;

class Logger implements logInterface
{
    private $file;
    private $prenom;

    public function __construct($file)
    {
        $this->file = $file;
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
     * Get the value of file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    public function write()
    {
        if(isset($_POST['valider'])){
            fwrite($this->file, $this->prenom . ' a cliqué sur Valider' .  "\n");
        } elseif(isset($_POST['update'])){
             fwrite($this->file, $this->prenom . ' a cliqué sur le bouton Modifier' . "\n");
        } elseif(isset($_POST['delete'])){
            fwrite($this->file, $this->prenom . ' a supprimé un jeu' . "\n");
        }
    }
}
