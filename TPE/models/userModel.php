<?php

class userModel {

    private $db;

    public function __construct() {
    
    $this->db = new PDO('mysql:host=localhost;dbname=soy_yo;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'soy_yo';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } 
        catch (Exception $e) {
            echo(var_dump($e));
        }
    }

    //Obtiene un usuario de la DDBB según el username recibido por parametro
    public function getUserByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM `user` WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);      
    }

    //Agrega un nuevo usuario
    public function addUser($user,$password){
        $query = $this->db->prepare('INSERT INTO user (username, password, admin) VALUES (?, ?, ?)');
        return $query->execute([$user, $password, 0]);
    }

    //Obtiene el listado de usuarios
    public function getUsers(){
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //Cambia permisos de administrador
    public function changePermitAdmin($user, $admin){
        var_dump($admin);
        $query = $this->db->prepare('UPDATE `user` SET `admin`= ?  WHERE `username` = ?');
        return $query->execute([$admin,$user]);
    }

    //Elimina un usuario 
    public function deleteUser($id){
        $query = $this->db->prepare('DELETE FROM `user` WHERE `id_user`= ?');
        return $query->execute([$id]);
    }
}
?>
