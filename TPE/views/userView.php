<?php
require_once('libs/Smarty.class.php');

class userView {
 
 function showLogin(){
    $smarty = new Smarty();
    $smarty->assign('title','Login');
    $smarty->display('templates/login.tpl');
}
}
?>