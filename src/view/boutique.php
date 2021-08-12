<?php require_once "header.php"; ?>


<div class="categories">
    <h1>Categories :</h1>
    <ul class="categories-link">
        <li><a href="#">Chaise</a></li>
        <li><a href="#">Fauteuil</a></li>
        <li><a href="#">Lit</a></li>
        <li><a href="#">Table</a></li>
        <li><a href="#">Salon</a></li>
    </ul>
</div>
<div class="boutique">
    <?php
    require "../../src/controller/control.php";
    foreach ($contain as  $produit) :
    ?>

        <div class="boutique-ctn">
            <a href="article.php?id_produit=<?= $produit->id_produit ?>">
                  <img src="../../src/model/classes/<?= $produit->image ?>">
            </a>
            <a href="http://localhost/projet-php-e-com/site-vente-immobilier/src/view/cart.php?id=<?= $produit->id_produit ?>"class='paniers'>
            <div class="proprites">
                
                 <h4><?= ucwords($produit->nom); ?></h4>
                <p>Price:<?= number_format($produit->prix, 2, ',', ''); ?> £</p>
                </div>
                </a>
               
            
        </div>

    <?php endforeach ?>
</div>

<?php require_once "footer.php"; ?>