<?php
require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class productView {

    private $smarty;

    public function __construct() {
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('username', $username);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    public function showProducts($products){
        $this->smarty->assign('title','Product List');
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/products.tpl');
    }

    public function showProductDetail($product){
        $this->smarty->assign('title','Product Detail');
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/productDetail.tpl');
    }

    function showProductsByCollection($products,$collections){
        $this->smarty->assign('title','Products by Collection');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/productsByCollection.tpl');
    }
}

?>