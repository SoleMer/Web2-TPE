<?php

include_once('models/userModel.php');
include_once('views/userView.php');

class userController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new userModel();
        $this->view = new userView();
    }

    //muestra el formulario
    public function showLogin() {
        $users = $this->model->getAll();
        $this->view->showLogin($users);
    }

    
}

?>