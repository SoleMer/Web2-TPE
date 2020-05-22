<?php
require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class ProductView {

 function showProductsSelect($products , $collections){
    $smarty = new Smarty();
    $authHelper = new AuthHelper();
    $username = $authHelper->getLoggedUserName();
    $smarty->assign('title','Product List');
    $smarty->assign('username', $username);
    $smarty->assign('products', $products);
    $smarty->assign('collections', $collections);
    $smarty->display('templates/productsSelect.tpl');
}

}

?>