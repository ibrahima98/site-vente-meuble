<?php require_once "header.php"; ?>


<section class="article-section">

    <div class="aside-article">
    <?php 
        require "../../src/controller/control.php";
  /**
     * afficher les articles en details avec leur desciption
     *
     */
       $article =$DB->getInfoBdd("SELECT * FROM produit where id_produit =".$_GET['id_produit']);
          foreach ($article as  $produit):
           
        ?> 
        <p>Produits Similaire</p>
        <div class="aside-article-ctn">
            <div>
                <img  src="../../src/model/classes/<?=$produit->image?>" class="img-smaller">
                <h4><?=$produit->nom?></h4>
            </div>
            <div>
            <img  src="../../src/model/classes/<?=$produit->image?>" class="img-smaller">
                <h4><?=$produit->nom?></h4>
            </div>
            <div>
            <img  src="../../src/model/classes/<?=$produit->image?>" class="img-smaller">
                <h4><?=$produit->nom?></h4>
            </div>
            <div>
            <img  src="../../src/model/classes/<?=$produit->image?>" class="img-smaller">
                <h4><?=$produit->nom?></h4>
            </div>


        </div>

    </div>
    <div class="ctn-article">
        <div>
        <img  src="../../src/model/classes/<?=$produit->image?>"  class="img-larger">
            <h1><?=$produit->nom?></h1>
            <p><?=$produit->description?> </p>
            <p class="prix"><?=$produit->prix?></p>
        </div>
        <p class="ajoutPanier-btn"><a href="http://localhost/projet-php-e-com/site-vente-immobilier/src/view/cart.php?id=<?= $produit->id_produit ?> ">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="svg-inline--fa fa-arrow-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path>
                </svg>
            </a></p>
    </div><?php endforeach ?>

</section>









<?php require_once "footer.php"; ?>