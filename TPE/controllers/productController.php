<?php

include_once('models/ProductModel.php');
include_once('views/productDetailView.php');

class ProductController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new productDetailView();
    }

    /**
     * Muestra la lista de productos.
    **/
    public function showProducts() {
        $products = $this->model->getAll();
        $this->view->showProducts($products);
    }

    public function showProductDetail($idProduct) {
        $product = $this->model->getProductById($idProduct);
        $this->view->showProductDetail($product);
    }
    
}

?>