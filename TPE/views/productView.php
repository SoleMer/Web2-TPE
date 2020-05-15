<?php

class ProductView {

/*
 * @return string
 * Contruye el html para visualizar los productos guardados en la bd
 */

 function showProducts($products){
    $smarty = new Smarty();
    $smarty->assign('title','Product List');
    $smarty->assign('products', $products);
}

function showProduct($products){
    $smarty = new Smarty();
    $smarty->assign('title','Product Detaill');
    $smarty->assign('products', $product);
}
}

?>