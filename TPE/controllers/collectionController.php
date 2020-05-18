<?php

include_once('models/collectionModel.php');
include_once('views/collectionView.php');

class CollectionController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new collectionModel();
        $this->view = new collectionView();
    }
    
    public function showCollections() {
        $products = $this->model->getAll();
        $this->view->showCollections($products);
    }
}
?>