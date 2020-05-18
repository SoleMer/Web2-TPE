<?php

include_once('models/ProductModel.php');
include_once('views/ProductView.php');

class ProductController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new productView();
    }

    /**
     * Muestra la lista de productos.
    **/
    public function showProducts() {
        $products = $this->model->getAll();
        $this->view->showProducts($products);
    }

    
}

?>