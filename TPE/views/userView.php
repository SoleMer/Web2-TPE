<?php
require_once('libs/Smarty.class.php');

class userView {
 
/**private $smarty;

 public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('base_url', BASE_URL);
 }*/

 public function showLogin($error=null){
    $smarty = new Smarty();
    $smarty->assign('title','Login');
    $smarty->assign('error', $error);
    $smarty->display('templates/login.tpl');
 }

}
?>

