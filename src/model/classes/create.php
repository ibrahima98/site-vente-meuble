<?php

use App\Categorie;
use App\Database;
use App\Produit;
use App\ProduitManager;

require_once dirname(dirname(dirname(dirname(__FILE__)))) . "\\vendor\autoload.php";




$errors = [];
$nom = '';
$price = '';
$description = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cate =  $_POST['categorie'];
    $categorie = new Categorie($cate);
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    $db = new Database;

    $pManager = new ProduitManager($db);


    if (!$nom) {
        $errors[] = 'Product title is required';
    }
    if (!$prix) {
        $errors[] = 'Product price is required';
    }

    if (!is_dir('images')) {
        mkdir('images');
    }

    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = '';

        if ($image && $image['tmp_name']) {

            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];


            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }


        $produit = new Produit($nom, $prix, $categorie, $description, $imagePath);
        $pManager->addModule($produit);
    }
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Products CRUD</title>
</head>

<body>

    <h1 class="h1create">Create new Product :</h1>

    <?php if (!empty($errors)) : ?>
        <div class="errorctn">
            <?php foreach ($errors as $error) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <form action="" method="post" enctype="multipart/form-data" class="form1">

        <div>
            <label>Product Image</label>
            <input type="file" name="image" class="inputTextimg">
        </div>

        <div>
            <label>Product Name</label>
            <input type="text" name="nom" class="inputText" value="<?php echo $nom ?>">
        </div>

        <div>
            <label>Product Description</label>
            <textarea class="areatext" name="description"><?php echo $description ?></textarea>
        </div>

        <div>
            <label>Product Price</label>
            <input type="number" name="prix" step=".01" value="<?php echo $prix ?>" class="inputText">
        </div>

        <div>
            <label>Catetegorie du Produit :</label>
            <select name="categorie">
                <option value="">--Select--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

        </div>
        <button type="submit" class="valider">Submit</button>
    </form>
</body>

</html>