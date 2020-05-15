<?php

class CollectionView {

/*
 * @return string
 * Contruye el html para visualizar las colecciones guardadas en la bd
 */

 function showCollections($collections){
    $smarty = new Smarty();
    $smarty->assign('title','Collections List');
    $smarty->assign('collections', $collections);
}

function showCollection($collection){
    $smarty = new Smarty();
    $smarty->assign('title','Product of Collection');
    $smarty->assign('collection', $collection);
}
}

?>