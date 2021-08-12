<?php
namespace App;
use App\Database;
use App\Panier;
use App\ProduitManager;
//use App\Panier;
/*use App\Categorie;

use App\Produit;
use App\ProduitManager;*/
//require_once("../../src/model/classes/Produit/Database.php");

require_once("../../vendor/autoload.php");


$DB = new Database();
$DB->getConnection();

//afficher les 3 derniers produits

    $contains=$DB->getInfoBdd('SELECT * FROM produit ORDER BY id_produit DESC limit 3');
 //affiche tout les produits qui existe dans la la base de données par ordre de dernier produit aux plus anciens
    $contain=$DB->getInfoBdd('SELECT * FROM produit ORDER BY id_produit DESC ');
    
    
    $panier = new Panier();

    if(isset($_GET['id'])){
     
      $product=$DB->query('SELECT id_produit FROM PRODUIT WHERE id_produit=:id_produit', array('id_produit'=>$_GET['id']));
      
     if(empty($product)){
         die("ce produit n'existe pas");
         
     }
    $panier->add($product[0]->id_produit);
    /*die('le produit a bien été ajouté');*/
     
  }elseif(isset($_GET['del'])){
      
          $panier->del($_GET['del']);
     
  }elseif (empty($_GET['id'])) {
      //$product=$DB->query('SELECT id_produit FROM PRODUIT WHERE id_produit=:id_produit', array('id_produit'=>$_GET['']));
  }
  
  else{
      die("désolé le panier est vide car vous n'avez pas choisis des produits");
  }


  
