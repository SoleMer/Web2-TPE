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
    
    //Muestra todas las colecciones
    public function showCollections() {
        $collections = $this->model->getAll();
        $userLogged = AuthHelper::checkLoggedIn();
        if($userLogged == true){
            $permitAdmin = AuthHelper::checkAdmin();
            if($permitAdmin == 1){
                $this->view->showCollectionsABM($collections,$userLogged,$permitAdmin);
            }
            else{
                $this->view->showCollectionsABM($collections);
            }
        }
        else{
            $this->view->showCollectionsABM($collections);
        }
    }

    //Muestra una colección recibida por parámetro
    public function showCollectionDetail($collectionName){
        $collection = $this->model->getCollectionByName($collectionName);
        $this->view->showProductDetail($collection);
    }

    //Agrega una colección a la base de datos
    public function addCollection() {
        if (empty($_POST['collectionName'])) {
            $this->errorView->showError("Faltan datos obligatorios");
            die();
        }
        $name = $_POST['collectionName'];
        
        $this->model->save($name);
        
        header("Location: ". BASE_URL. 'collections');
    }

    //Elimina una colección recibida por parámetro de la base de datos
    function deleteCollection($id) {
        $this->model->deleteCollectionDB($id);
        header("Location: ". BASE_URL. 'collections');
    }

    //Edita una colección recibida por parámetro
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