<?php
require_once 'models/productModel.php';
require_once 'api/APIView.php';


class ProductApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new APIView();
    }

    function getData(){
        return json_decode($this->data);
    }

    public function getProducts($params = []) {
        if(empty($params)) {
            $products = $this->model->getAll();
            $this->view->response($products, 200);
        }
        else {
            $idProduct = $params[':ID'];
            $product = $this->model->getProducts($idProduct);
            if ($product)
                $this->view->response($product, 200);
            else
                $this->view->response("no existe producto con id {$idProduct}", 404);
        }
    }

    public function deleteProduct($params = []) {
        $idProduct = $params[':ID'];
        $product = $this->model->getProduct($idProduct);
        if(empty($product)) {
            $this->view->response("no existe producto con id {$idProduct}", 404);
            die;
        }
        $this->model->deleteProduct($idProduct);
        $this->view->response("El producto con id:  {$idProduct} se elimino correctamente", 200);
    }

    public function addProduct() {
        $body = $this->getData();

        $name = $body->name;
        $cost = $body->cost;
        $id_collection = $body->id_collection;
        $this->model->save($name, $cost, $id_collection); //insert en nuestra BD
    }

    public function updateProdct($params = []) {
        $product_id = $params[':ID'];
        $product = $this->model->getProduct($product_id);

        if ($product) {
            $body = $this->getData();
            $name = $body->name;
            $cost = $body->cost;
            $id_collection = $body->id_collection;
            $product = $this->model->updateProduct($product_id, $name, $cost, $id_collection);
            $this->view->response("producto id=$product_id actualizado con éxito", 200);
        }
        else
            $this->view->response("Product id=$product_id not found", 404);
    }

}
?>