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

    //Muestra el formulario de login
    public function showLogin() {
        $this->view->showLogin();
    }

    //Verifica que el usuario y la contraseña coincidan con las guardadas en la DDBB
    public function verify(){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $userDb = $this->model->getUserByUsername($user);
        }
        $hash = $userDb->password;
        $response = password_verify($pass, $hash);
        
        if($response == true){
            // INICIO LA SESSIÓN Y LOGUEO AL USUARIO
            session_start();
            $_SESSION['ID_USER'] = $userDb->id;
            $_SESSION['USERNAME'] = $userDb->username;
            //VUELVO AL LISTADO DE PRODUCTOS
            header('Location: ' . "products");
        }
        else {
            //MUESTRO MENSAJE DE ERROR DE LOGIN
            $this->view->showLogin("Login incorrecto");
        }
    }
    

    //Se desloguea el usuario
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . 'login');
    }
        
}

?>