<?php
require_once('libs/Smarty.class.php');
include_once('helpers/auth.helper.php');

class CollectionView {

    private $smarty;

    public function __construct() {
        $authHelper = new AuthHelper();
        $username = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('username', $username);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    function showCollections($collections){
        $this->smarty->assign('title','Collections List');
        $this->smarty->assign('collections', $collections);
        $this->smarty->display('templates/collections.tpl');
    }

}

?>