<?php

require_once('db.php');

if($_GET['action'] == '')
    $_GET['action'] = 'home';

$urlParts = explode(delimiter '/', $_GET['action']);

switch ($urlParts[0]) {
    case 'home':
        # code...
        break;
    
    default:
        echo showProduct();
        break;
}