<?php

require_once('db.php');
require_once('controllers/productController.php');
require_once('controllers/collectionController.php');
require_once('controllers/productsByCollectionController.php');
require_once('controllers/userController.php');

if($_GET['action'] == '')
    $_GET['action'] = 'products';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {
    case 'home':
        //DESARROLLAR
    case 'login':
        $controller = new userController();
        $controller->showLogin();
    case 'products':
        $controller = new ProductsByCollectionController();
        $controller->showProductsByCollection();
        break;
    case 'product':
        $controller = new productController();
        $controller->showProductDetail($urlParts[1]); 
    case 'collections':
        $controller = new collectionController();
        $controller->showCollections();
    break;
    default:
        echo "<h1>Error 404</h1>";
        break;
}