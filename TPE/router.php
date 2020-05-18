<?php

require_once('db.php');
require_once('controllers/productController.php');
require_once('controllers/collectionController.php');
require_once('controllers/productsByCollectionController.php');

if($_GET['action'] == '')
    $_GET['action'] = 'products';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {
    case 'products':
        $controller = new ProductsByCollectionController();
        $controller->showProductsByCollection();
        break;
/*    case 'product':
        $controller = new productController();
        $controller->showProduct(); */
    case 'collections':
        $controller = new collectionController();
        $controller->showCollections();
    break;
    default:
        echo "<h1>Error 404</h1>";
        break;
}