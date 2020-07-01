<?php
require_once('libs/smarty/Smarty.class.php');
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
   public function showLogin($error=null,$userLogged=null,$permit=null){
      $this->smarty->assign('title','Login');
      $this->smarty->assign('error', $error);
      $this->smarty->assign('userLogged', $userLogged);
      $this->smarty->assign('permit', $permit);
      $this->smarty->display('templates/login.tpl');
   }

   //Construye el html para mostrar el formulario de registro de usuarios
   public function showRegister($error=null){
      $this->smarty->assign('title','Register');
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/register.tpl');
   }

   //Muestra el listado de usuarios
   public function showUsers($users){
      $this->smarty->assign('title','Users');
      $this->smarty->assign('users', $users);
      $this->smarty->display('templates/users.tpl');
   }
}
?>

