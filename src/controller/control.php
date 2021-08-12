<?php
namespace App;
use App\Database;
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
    
    



  
