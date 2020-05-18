<?php

require_once('libs/Smarty.class.php');

class ProductsByCollectionView {

 function showProducts($products , $collections){
    $smarty = new Smarty();
    $smarty->assign('title','Product by Collections');
    $smarty->assign('products', $products);
    $smarty->assign('products', $collections);
    $smarty->display('templates/productsByCollection.tpl');
 }
}
?>