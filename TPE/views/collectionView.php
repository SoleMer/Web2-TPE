<?php
require_once('libs/smarty/Smarty.class.php');
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

    //Construye el html para mostrar todas las colecciones 
    //+ servicio de ABM si el usuario esta logeado y es administrador
    function showCollectionsABM($collections, $userLogged=null, $permit=null){
        $this->smarty->assign('title','Collections List');
        $this->smarty->assign('collections', $collections);
        $this->smarty->assign('userLogged', $userLogged);
        $this->smarty->assign('permit', $permit);
        $this->smarty->display('templates/collections.tpl');
    }

    //Construye el html para mostrar una colección
    public function showProductDetail($collection){
        $this->smarty->assign('title','Collection Detail');
        $this->smarty->assign('collection', $collection);
        $this->smarty->display('templates/collectionDetail.tpl');
    }

}

?>