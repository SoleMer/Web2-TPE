<?php
require_once('libs/smarty/Smarty.class.php');

class errorView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('baseURL', BASE_URL);
    }

    //Construye el html para mostrar un mensaje de error
    public function showError($msg) {
        $this->smarty->assign('message', $msg);
        $this->smarty->assign('title', 'Error');
        $this->smarty->display('templates/error.tpl');
    }

}
?>