<?php
require_once('libs/Smarty.class.php');

class productView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('baseURL', BASE_URL);
    }

    public function showError($msg) {
        $this->smarty->assign('message', $msg);
        $this->smarty->assign('title', 'Error');
        $this->smarty->display('templates/error.tpl');
    }

}
?>