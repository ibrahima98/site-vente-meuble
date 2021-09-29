<?php
namespace App;
/*use App\control;
require_once("../../vendor/autoload.php");*/
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


