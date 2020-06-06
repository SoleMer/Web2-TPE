<?php
require_once 'models/productModel.php';
require_once 'api/APIView.php';


class SoyYoApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new APIView();
    }

    public function getProducts($params = []) {
        if(empty($params)) {
            $products = $this->model->getAll();
            $this->view->response($products, 200);
        }
        else {
            $idProduct = $params[':ID'];
            $product = $this->model->getTask($idProduct);
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
}
?>