<?php

include_once('models/ProductoModel.php');
include_once('views/ProductoView.php');

class ProductoController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
    }

    /**
     * Muestra la lista de productos.
    **/
    public function showProducts() {
        $products = $this->model->getAll();
        $this->view->showProducts($products);
    }