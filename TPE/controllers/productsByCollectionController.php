<?php

include_once('models/productModel.php');
include_once('models/collectionModel.php');
include_once('views/productsByCollectionView.php');

class ProductsByCollectionController {

    private $pModel;
    private $cModel;
    private $view;

    public function __construct() {
        $this->pModel = new productModel();
        $this->cModel = new collectionModel();
        $this->view = new productsByCollectionView();
    }

    public function showProductsByCollection() {
        $products = $this->pModel->getAll();
        $collections = $this->cModel->getAll();
        $this->view->showProducts($products , $collections);
    }
}

?>