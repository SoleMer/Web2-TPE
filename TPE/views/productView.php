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
    //+ servicio de ABM si el usuario tiene permisos de administrador
    public function showProducts($products,$collections,$permitAdmin=null){
        $this->smarty->assign('title','Product List');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('collections', $collections);
        $this->smarty->assign('permit', $permitAdmin);
        $this->smarty->display('templates/products.tpl');
    }

    //Construye el html para mostrar el detalle de un producto 
    //+ los comentarios si el usuario esta loggeado
    //+ servicio de ABM si el usuario tiene permisos de administrador
    public function showProductDetail($product,$collections,$userLogged=null,$permitAdmin=null,$user=null){
        $this->smarty->assign('title','Product Detail');
        $this->smarty->assign('product', $product);
        $this->smarty->assign('collections', $collections);
        $this->smarty->assign('userLogged', $userLogged);
        $this->smarty->assign('permit', $permitAdmin);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/productDetail.tpl');
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