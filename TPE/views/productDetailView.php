<?php
require_once('libs/Smarty.class.php');
class productDetailView {

function showProductDetail($product){
    $smarty = new Smarty();
    $smarty->assign('title','Product Detail');
    $smarty->assign('product', $product);
    $smarty->display('templates/productDetail.tpl');
}
}

?>