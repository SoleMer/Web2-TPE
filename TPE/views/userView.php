<?php
require_once('libs/Smarty.class.php');

class userView {

public $smarty; 

 function showLogin($users){
    $smarty = new Smarty();
    $smarty->assign('title','Login');
    $smarty->assign('users', $users);
    $smarty->display('templates/login.tpl');
}

}

?>