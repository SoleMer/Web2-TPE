<?php

include_once('models/colectionModel.php');
include_once('views/colectionView.php');

class CollectionController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new colectionModel();
        $this->view = new colectionView();
    }
    
    public function showColections() {
        $products = $this->model->getAll();
        $this->view->showColections($products);
    }
}
?>