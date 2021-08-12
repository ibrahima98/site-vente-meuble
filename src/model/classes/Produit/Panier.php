<?php
namespace App;
use App\control;
require_once("../../vendor/autoload.php");
/***
 * classe qui permet d'ajouter des produits au panier grace aux ids de chaque produit
 *  chaque id des produit sont stocké dans une session.
 */

class Panier{
    public function __construct(){
        
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']= array();
        }
       
    }
    public function add($product_id){
         $_SESSION['panier'][$product_id]=1;
    }
    public function del($product_id){
       unset( $_SESSION['panier'][$product_id]);
    }
}
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
