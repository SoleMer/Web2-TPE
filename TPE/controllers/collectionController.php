<?php

include_once('models/collectionModel.php');
include_once('views/collectionView.php');
include_once('views/errorView.php');

class CollectionController{

    private $model;
    private $view;
    private $prodModel;
    private $errorView;

    public function __construct() {
        $this->model = new collectionModel();
        $this->view = new collectionView();
        $this->prodModel = new productModel();
    }
    
    public function showCollections() {
        $collections = $this->model->getAll();
        $this->view->showCollections($collections);
    }

    public function showCollectionDetail($collectionName){
        $collection = $this->model->getCollectionByName($collectionName);
        $this->view->showProductDetail($collection);
    }

    public function addCollection() {
        if (empty($_POST['collectionName'])) {
            $this->errorView->showError("Faltan datos obligatorios");
            die();
        }
        $name = $_POST['collectionName'];
        
        $this->model->save($name);
        
        header("Location: ". BASE_URL. 'collections');
    }

    function deleteCollection($id) {
        $this->model->deleteCollectionDB($id);
        header("Location: ". BASE_URL. 'collections');
    }

    public function editCollection($id) {
        if (empty($_POST['collectionName'])) {
            $this->errorView->showError("Faltan datos obligatorios");
            die();
        }
        $name = $_POST['collectionName'];
        
        $this->model->editCollectionDB($id, $name);

        header("Location: ". BASE_URL. 'collections');
    }
}
?>