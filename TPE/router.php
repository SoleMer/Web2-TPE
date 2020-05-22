<?php

require_once('db.php');
require_once('controllers/homeController.php');
require_once('controllers/productController.php');
require_once('controllers/collectionController.php');
require_once('controllers/productsByCollectionController.php');
require_once('controllers/userController.php');

if($_GET['action'] == '')
    $_GET['action'] = 'products';

$urlParts = explode('/', $_GET['action']);

switch ($urlParts[0]) {
    case 'home':
        $controller = new homeController();
        $controller->showHome();
        break;
    case 'login':
        $controller = new userController();
        $controller->showLogin();
    break;
    case 'verify':
        $controller = new userController();
        $controller->verify();
    break;
    case "logout":
        $controller = new UserController();
        $controller->logout();
    break;
    case 'products':
        $controller = new ProductsByCollectionController();
       // $controller->showProductsByCollection();
        $controller->showProductsSelect();
        break;
    case 'product':
        $controller = new productController();
        $controller->showProductDetail($urlParts[1]); 
    break;
    case 'collections':
        $controller = new collectionController();
        $controller->showCollections();
    break;
    default:
        echo "<h1>Error 404</h1>";
        break;
}