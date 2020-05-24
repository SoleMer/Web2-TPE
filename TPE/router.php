<?php

require_once('db.php');
require_once('controllers/homeController.php');
require_once('controllers/productController.php');
require_once('controllers/collectionController.php');
require_once('controllers/userController.php');

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

//Si $_GET está vacío, le otorga el valor 'home'
if($_GET['action'] == '')
    $_GET['action'] = 'home';

//$urlParts el un array que en cada posición adquiere lo ue está cargado después de cada "/" de la url
$urlParts = explode('/', $_GET['action']);

//Según lo que haya en $urlParts en la posición 0, redirige el sitio a una página diferente
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
        $controller = new productController();
        $controller->showProducts(); 
        break;
    case 'product':
        $controller = new productController();
        $controller->showProductDetail($urlParts[1]); 
    break;
    case 'productsByCollection':
        $controller = new productController();
        $controller->showproductsByCollection(); 
    break;
    case 'new':
        $controller = new productController();
        $controller->addProduct(); 
    break;
    case 'delete':
        $controller = new productController();
        $controller->deleteProduct($urlParts[1]);
    break;
    case 'edit':
        $controller = new productController();
        $controller->editProduct($urlParts[1]);
    break;
    case 'collections':
        $controller = new collectionController();
        $controller->showCollections();
    break;
    case 'collection':
        $controller = new collectionController();
        $controller->showCollectionDetail($urlParts[1]);
    break; 
    case 'newCollection':
        $controller = new collectionController();
        $controller->addCollection();
    break;
    case 'deleteCollection':
        $controller = new collectionController();
        $controller->deleteCollection($urlParts[1]);
    break;
    case 'editCollection':
        $controller = new collectionController();
        $controller->editCollection($urlParts[1]);
    break;
    default:
        echo "<h1>Error 404</h1>";
    break;
}