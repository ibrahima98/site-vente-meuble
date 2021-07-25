<?php

namespace App;

require_once("./../../../../vendor/autoload.php");

use App\Database;

use PDOException;
use PDO;

class ProduitManager
{
    private $tableName = "produit";
    private $database;
    private $conn;

    public function __construct(Database $db)
    {
        $this->database = $db;
        $this->conn = $this->database::getConnection();
    }

    //Ajouter un module dans la table module
    public function addModule($produit)
    {
        //Utilisation d'une requêt paramétrée pour insertion dans la table module
        $requete = "INSERT INTO " .
            $this->tableName . "(nom, description, prix, categorie,image)
                VALUES(:nom, :description, :prix, :categorie, :image)";

        //On récupère les données stockées dans les attributs de l'objet 
        //passé en paramètre
        $nom = $produit->getNom();
        $description = $produit->getDescription();
        $prix = $produit->getPrix();
        $categorie = $produit->getCategorie();
        $image = $produit->getImage();

        //Liaison des champs de la table module avec les données contenues
        //dans les attributs de l'objet module
        $stmt = $this->conn->prepare($requete);

        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':prix', $prix);
        $stmt->bindValue(':categorie', $categorie);
        $stmt->bindValue(':image', $image);


        try {
            $stmt->execute();
            return header("Location: main.php");
        } catch (PDOException $ex) {
            die("L'exécuation de la requête a échoué: " . $ex->getMessage());
            return false;
        }
    }



    //Modofier un module dans la table module
    public function editModule($id, $produit)
    {
        $requete = "UPDATE " . $this->tableName . " SET nom= :nom,
                    description=:description, prix=:prix, categorie=:categorie, image=:image WHERE id=:id";

        $id_produit = $id;
        $nom = $produit->getNom();
        $description = $produit->getDescription();
        $prix = $produit->getPrix();
        $categorie = $produit->getCategorie();
        $image = $produit->getImage();

        $stmt = $this->conn->prepare($requete);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':prix', $prix);
        $stmt->bindValue(':categorie', $categorie);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':id', $id_produit);
        try {
            $stmt->execute();
            return header("Location: main.php");
        } catch (PDOException $ex) {
            die("La modification a échoué: " . $ex->getMessage());
        }
    }


    //Supprimer un module par son id dans la table module
    public function deleteModule($id)
    {
        $requete = "DELETE FROM " . $this->tableName . " WHERE id=:id";
        $idProduit = $id;
        $stmt = $this->conn->prepare($requete);
        $stmt->bindValue(':id', $idProduit);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("La suppression a échoué: " . $ex->getMessage());
        }
    }


    //Sélectionner tous les modules dans la table module
    public function getAllProduit()
    {
        $requete = "SELECT id_produit, nom, description, prix, categorie, image FROM " .
            $this->tableName . " ORDER BY nom_module ";

        $stmt = $this->conn->prepare($requete);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {

            die("L'exécuation de la requête a échoué: " . $ex->getMessage());
        }
        $rowProduit = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rowProduit;
    }
}
