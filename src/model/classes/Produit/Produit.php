<?php

namespace App;

require_once("../../../../vendor/autoload.php");

use App\Categorie;


class Produit
{
    private $id_produit;
    private $nom;
    private $prix;
    private $categorie;
    private $description;
    private $image;

    public function __construct($id_produit = 0, $nom = "", $prix = "", Categorie  $categorie, $description = "", $image = null)
    {
        $this->id_produit = $id_produit;
        $this->nom = $this->setNom($nom);
        $this->prix = $this->setPrix($prix);
        $this->categorie = $this->setCategorie($categorie);
        $this->description = $this->setDescription($description);
        $this->image = $this->setImage($image);
    }


    //Pour les getters

    public function getId_produit()
    {
        return $this->id_produit;
    }

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
    public function setId_produit($id)
    {
        $this->id_produit = $id;
    }

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
