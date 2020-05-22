<?php

include_once('models/productModel.php');
include_once('models/collectionModel.php');
//include_once('views/productsByCollectionView.php');
include_once('views/productView.php');

class ProductsByCollectionController {

    private $pModel;
    private $cModel;
    private $view;

    public function __construct() {
        $this->pModel = new productModel();
        $this->cModel = new collectionModel();
        //$this->view = new productsByCollectionView();
        $this->view = new productView();
    }

    private function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['ID_USER'])){
            header('Location: ' . BASE_URL . "login");
            die;
        }
    }

    public function showProductsByCollection() {
        $products = $this->pModel->getAll();
        $collections = $this->cModel->getAll();
        $this->view->showProducts($products,$collections);
    }
    public function showProductsSelect() {
        $products = $this->pModel->getAll();
        $collections = $this->cModel->getAll();
        $this->view->showProductsSelect($products,$collections);
    }
}

?>