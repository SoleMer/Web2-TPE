<?php
require_once('libs/smarty/Smarty.class.php');
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

    //Construye el html para mostrar todos los productos
    public function showProducts($products,$collections){
        $this->smarty->assign('title','Product List');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/products.tpl');
    }

    //Construye el html para mostrar todos los productos + servicio de ABM
    public function showProductsABM($products,$collections){
        $this->smarty->assign('title','Product List');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/productsABM.tpl');
    }

    //Construye el html para mostrar el detalle de un producto
    public function showProductDetail($product,$collections){
        $this->smarty->assign('title','Product Detail');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/productDetail.tpl');
    }

    //Construye el html para mostrar el detalle de un producto + servicio de ABM
    public function showProductDetailABM($product,$collections){
        $this->smarty->assign('title','Product Detail');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/productVistaNueva.tpl');
    }

    //Construye el html para mostrar todos los productos listados por colección
    function showProductsByCollection($products,$collections){
        $this->smarty->assign('title','Products by Collection');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/productsByCollection.tpl');
    }
}

?>