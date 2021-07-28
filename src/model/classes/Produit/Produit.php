<?php

namespace App;

require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "\\vendor\autoload.php";

use App\Categorie;


class Produit
{

    private $nom;
    private $prix;
    private $categorie;
    private $description;
    private $image;

    public function __construct($nom = "", $prix = "", $categorie, $description = "", $image = null)
    {

        $this->nom = $nom;
        $this->prix = $prix;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->image = $image;
    }


    //Pour les getters


    public function getNom()
    {
        return $this->nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }


    // Pour les setters

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrix($prix)
    {
        $this->price = $prix;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
