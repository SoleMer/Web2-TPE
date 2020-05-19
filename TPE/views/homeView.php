<?php
require_once('libs/Smarty.class.php');

class homeView {
 
 function showHome(){
    $smarty = new Smarty();
    $smarty->assign('title','Home');
    $smarty->display('templates/home.tpl');
}
}
?>