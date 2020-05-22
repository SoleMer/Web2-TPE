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
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $userDb = $this->model->getUserByUsername($user);

            if(!empty($userDb) && ($pass === $userDb->password)){
                // INICIO LA SESSION Y LOGUEO AL USUARIO
                session_start();
                $_SESSION['ID_USER'] = $userDb->id;
                $_SESSION['USERNAME'] = $userDb->username;

                header('Location: ' . "products");
            }
            else {
                $this->view->showLogin("Login incorrecto");
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . 'login');
    }
        
}

?>