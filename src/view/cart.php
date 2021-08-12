<?php
/**
 * page de gestioon des affichage du panier
 */
require_once("header.php");

 ?>
 
<body>
    
    <div class='contain-cart'>
            <h2 class="titre">Shopping Cart</h2>
            <button class='paiement'>Proceed to checkout</button>
    </div>
    <section class='sections'>
        <table>
            <tr> 

                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SubTotal</th>
                <th>Actions</th>
            </tr>
            <?php
            require "../../src/controller/control.php";
          
            $ids=array_keys($_SESSION['panier']);
            if(empty($ids)){
                  $products=array();
            }else{
                $products = $DB->query('SELECT *  FROM produit  WHERE id_produit IN (' . implode(',', array_map('intval', $ids)) . ')');
            }
          
           // $produc = $DB->query("SELECT * FROM produit WHERE id_produit IN (17,16,15)");
         
            foreach($products as $product):
                  
            ?>
            <tr class='td'>
           
                <td class='last-produit-ctn pan'>
                <img src="../../src/model/classes/<?=$product->image?>">
                </td>
                <td><?=$product->nom?></td>
                <td><span><?=$product->prix ?></span>£</td>
                <td><span>1</span></td>
                <td><span><?=$product->prix ?></span>£</td>
                <td><a href="http://localhost/projet-php-e-com/site-vente-immobilier/src/view/cart.php?del=<?=$product->id_produit ?>" class='paniers'><button>Suprimer</button></a></td>
             
            </tr><?php endforeach ?>
            
        </table>

      
    </section>
</body>