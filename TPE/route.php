<?php

require_once('db.php');
require_once('controllers/productoController.php');

if($_GET['action'] == '')
    $_GET['action'] = 'home';

$urlParts = explode(delimiter '/', $_GET['action']);

switch ($urlParts[0]) {
    case 'products':
        $controller = new productoController();
        $controller->showProducts();
        break;
    default:
        echo "<h1>Error 404</h1>";
        break;
}