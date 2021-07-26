<?php

use App\Database;
use App\ProduitManager;

require_once dirname(dirname(dirname(dirname(__FILE__)))) . "\\vendor\autoload.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: main.php');
    exit;
}

$db = new Database();
$pManager = new ProduitManager($db);

$pManager->deleteModule($id);
