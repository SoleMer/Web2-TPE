<?php
require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class homeView {

    private $smarty;

    public function __construct() {
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('username', $username);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    //Construye el html para mostrar la página "home"
    public function showHome(){
        $this->smarty->assign('title','Home');
        $this->smarty->display('templates/home.tpl');
    }
}
?>