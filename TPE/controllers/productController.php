<?php

include_once('models/ProductModel.php');
include_once('views/productView.php');
include_once('views/errorView.php');

class ProductController {

    private $model;
    private $view;
    private $collModel;
    private $errorView;
  
    public function __construct() {
        $this->model = new productModel();
        $this->view = new productView();
        $this->collModel = new collectionModel();
        $this->helper = new authhelper();
    }

    // Muestra todos los productos
    public function showProducts() {
        $products = $this->model->getAll();
        $collections = $this->collModel->getAll();
        $userLogged = AuthHelper::checkLoggedIn();
        if($userLogged == true){
            $this->view->showProductsABM($products,$collections);
        }
        else{
            $this->view->showProducts($products,$collections);
        }
    }

    //Muestra un producto recibido por parametro
    public function showProductDetail($productName) {
        $product = $this->model->getProductByName($productName);
        $collections = $this->collModel->getAll();
        $userLogged = AuthHelper::checkLoggedIn();
        if($userLogged == true){
            $this->view->showProductDetailABM($product,$collections);
        }
        else{
            $this->view->showProductDetail($product,$collections);
        }
    }

    //Muestra todos los productos listados por colección
    public function showProductsByCollection() {
        $products = $this->model->getAll();
        $collections = $this->collModel->getAll();
        $this->view->showProductsByCollection($products,$collections);
    }
    
    //Agrega un producto a la DDBB
    public function addProduct() {
        if (empty($_POST['name']) || empty($_POST['cost']) || empty($_POST['id_collection'])) {
            $this->errorView->showError("Faltan datos obligatorios");
            die();
        }
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $collection = $_POST['id_collection'];

        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" 
            || $_FILES['input_name']['type'] == "image/png") {
            $success = $this->model->save($name, $cost, $collection, $_FILES['input_name']['tmp_name']);
        } else {
            $success = $this->model->save($name, $cost, $collection);
        }

        echo ($success);
        if($success)
            header('Location: ' . "products");
        else{
            $this->errorView->showError("Faltan datos obligatorios");
        }
        
    }

    //Elimina el producto recibido por parámetro de la DDBB
    function deleteProduct($id) {
        $this->model->deleteProductDB($id);
        header("Location: ". BASE_URL. 'products');
    }

    //Edita un producto recibido por parámetro
    public function editProduct($id) {
        if (empty($_POST['productname']) || empty($_POST['cost']) || empty($_POST['collection'])) {
            $this->errorView->showError("Faltan datos obligatorios");
            die();
        }
        $name = $_POST['productname'];
        $cost = $_POST['cost'];
        $collection = $_POST['collection'];
        
        $this->model->editProductDB($id, $name, $cost, $collection);

        header("Location: ". BASE_URL. 'products');
    } 
}

?>