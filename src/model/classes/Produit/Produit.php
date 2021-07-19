<?php

namespace App;

class Produit
{
    private $id_produit;
    private $nom;
    private $price;
    private $categorie;
    private $description;
    private $image;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function getId_produit()
    {
        return $this->id_produit;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategorie()
    {
        return $this->cetegorie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setId_produit($id)
    {
        $this->id_produit = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrice($price)
    {
        $this->price = $price;
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
