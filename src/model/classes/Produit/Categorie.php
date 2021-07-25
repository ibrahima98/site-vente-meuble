<?php

namespace App;

class Categorie
{
    private $id;
    private $nom;

    public function __construct($id, $nom = "")
    {
        $this->id = $this->setId($id);
        $this->nom = $this->setNom($nom);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}
