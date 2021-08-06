<?php
    
use App\Database;
use App\ProduitManager;

require_once dirname(dirname(dirname(dirname(__FILE__)))) . "\\vendor\autoload.php";

$db = new Database();
$pManager = new ProduitManager($db);

$search = $_GET['search'] ?? '';

if ($search) {
    $products = $pManager->rechercheProduit($search);
} else {

    $products = $pManager->getAllProduit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">
    <title>Products CRUD</title>
</head>

<body>
    <h1>Products CRUD :</h1>

    <p class="createCtn">
        <a href="create.php" class="create">Create Product</a>
    </p>

    <form>
        <div class="cnt-search">
            <input type="text" class="search" placeholder="Search for products" name="search" value="<?php echo $search ?>">
            <div class="cnt-btnSearch">
                <button class="btnSearh" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="carsTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Categorie</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $i => $product) : ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td>
                        <img class="thumb-img" src="<?php echo $product['image']; ?>">
                    </td>
                    <td><?php echo $product['nom'] ?></td>
                    <td><?php echo $product['prix'] ?></td>
                    <td><?php echo $product['categorie'] ?></td>
                    <td class="cntbtn">
                        <a href="update.php?id=<?php echo $product['id_produit'] ?>" class="bgcgreen">Edit</a>
                        <form style="display: inline-block" method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $product['id_produit'] ?>">
                            <button type="submit" class="bgcred">Delete</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>