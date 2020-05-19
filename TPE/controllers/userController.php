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
        $this->view->showLogin();
    }

    public function verify(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $user-> $_POST['email'];
            $pass-> $_POST['password'];
            echo $user . ' ' . $pass;
        }
        
    }
}

?>