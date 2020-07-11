<?php
require_once 'libs/router/Router.php';
require_once 'api/ApiController.php';

$router = new Router();

//$router->addRoute('recurso', 'verbo', 'controlador', 'funcion');
$router->addRoute('comments/product/:ID', 'GET', 'ApiController', 'getComments'); //obtener todos los comentarios de un producto
$router->addRoute('comments/product/:ID', 'POST', 'ApiController', 'addComment'); //agregar un comentario a un producto
$router->addRoute('comments/:ID', 'DELETE', 'ApiController', 'deleteComment');//eliminar un comentario
$router->addRoute('username/:ID', 'GET', 'ApiController', 'getUsername');

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);

?>