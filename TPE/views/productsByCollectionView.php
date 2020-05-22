<?php

require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class ProductsByCollectionView {

   private $smarty;

    public function __construct() {
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('username', $username);
        $this->smarty->assign('base_url', BASE_URL);
    }


 function showProducts($products,$collections){
    $this->smarty->assign('title','Product by Collections');
    $this->smarty->assign('products', $products);
    $this->smarty->assign('collections', $collections);
    $this->smarty->display('templates/productsByCollection.tpl');
 }
}

/**function showProducts($products,$collections){
    $smarty = new Smarty();
    $authHelper = new AuthHelper();
    $username = $authHelper->getLoggedUserName();
    $smarty->assign('title','Product by Collections');
    $smarty->assign('username', $username);
    $smarty->assign('products', $products);
    $smarty->assign('collections', $collections);
    $smarty->display('templates/productsByCollection.tpl');
 } */
 ?>