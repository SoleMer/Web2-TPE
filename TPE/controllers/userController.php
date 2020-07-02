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
        $userLogged = AuthHelper::checkLoggedIn();
        if($userLogged == true){
            $permitAdmin = AuthHelper::checkAdmin();
            if($permitAdmin == 1){
                $this->view->showLogin("Sesion iniciada",$userLogged,$permitAdmin);
            }
            else{
                $this->view->showLogin("Sesion iniciada",$userLogged);
            }
        }
        else{
            $this->view->showLogin();
        }
    }

    //Muestra el formulario de registro de usuario.
    public function showRegister() {
        $this->view->showRegister();
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
            $_SESSION['ADMIN'] = $userDb->admin;
            //VUELVO AL LISTADO DE PRODUCTOS
            header('Location: ' . "products");
        }
        else {
            //MUESTRO MENSAJE DE ERROR DE LOGIN
            $this->view->showLogin("Login incorrecto");
        }
    }

    //Recibe datos y agrega nuevo usuario.
    public function addUser(){
        //SI LOS DATOS NO ESTAN VACIOS COMPRUEBA QUE LA REPETICION DE CONTRASENA SEA CORRECTA
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repassword'])){
            if(($_POST['password']) != ($_POST['repassword'])){
                $this->view->showRegister("Las contrasenas no coinciden");
            }
            else{
                //SI LAS CONTRASENAS COINCIDEN SE GUARDAN LOS DATOS EN VARIABLES
                $user = $_POST['username']; 
                $pass = $_POST['password'];    
                $hash = password_hash($pass, PASSWORD_DEFAULT);
            }
        }
        //AGREGO EL USUARIO A LA DB
        $this->model->addUser($user,$hash);
        //OBTENGO LOS DATOS DEL NUEVO USUARIO
        $userDb = $this->model->getUserByUsername($user);
        //INICIO LA SESION DEL NUEVO USUARIO
        session_start();
        $_SESSION['ID_USER'] = $userDb->id;
        $_SESSION['USERNAME'] = $userDb->username;
        $_SESSION['ADMIN'] = $userDb->admin;
        //VUELVO AL LISTADO DE PRODUCTOS
        header('Location: ' . "products");
    }  

    //Se desloguea el usuario
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . 'login');
    }

    //Muestra la lista de usuarios
    public function showUsers(){
        $users = $this->model->getUsers();
        $this->view->showUsers($users);
    }

    //Otorga o quita permisos de administrador
    public function usersPermit($username){
        $user= $this->model->getUserByUsername($username);
        $admin= $user->admin;
        if ($admin == 0) {
            $admin = 1;
        }
        else{
            $admin = 0;
        }
        $this->model->changePermitAdmin($user->username, $admin);
        header("Location: " . BASE_URL. 'users');
    }

    //Elimina un usuario
    public function deleteUser($id){
        $this->model->deleteUser($id);
        header("Location: ". BASE_URL. 'users');
    }
        
}

?>