<?php
require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class userView {
 
   private $smarty;

   public function __construct() {
      $authHelper = new AuthHelper();
      $username = $authHelper->getLoggedUserName();
      $this->smarty = new Smarty();
      $this->smarty->assign('username', $username);
      $this->smarty->assign('baseURL', BASE_URL);
   }

   //Construye el html para mostrar el formulario de login
   public function showLogin($error=null){
      $this->smarty->assign('title','Login');
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/login.tpl');
 }

}
?>

