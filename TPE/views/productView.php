<?php
require_once('libs/Smarty.class.php');
class ProductView {

/*
 * @return string
 * Contruye el html para visualizar los productos guardados en la bd
 */

 function showProducts($products){
    $smarty = new Smarty();
    $smarty->assign('title','Product List');
    $smarty->assign('products', $products);
    $smarty->display('templates/productList.tpl');
}

function showProduct($product){
    $smarty = new Smarty();
    $smarty->assign('title','Product Detaill');
    $smarty->assign('products', $product);
    $smarty->display('templates/productDetail.tpl');
}
}

?>