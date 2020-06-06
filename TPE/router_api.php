<?php
require_once 'libs/router/Router.php';
require_once 'api/SoyYoApiController.php';

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('product', 'GET', 'SoyYoApiController', 'getProduct');
$router->addRoute('product/:ID', 'GET', 'SoyYoApiController', 'getProduct');
$router->addRoute('product/:ID', 'DELETE', 'SoyYoApiController', 'deleteProduct');


// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);

?>