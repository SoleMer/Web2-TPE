<?php

class productModel {

    private $db;

    public function __construct() {
    
    $this->db = new PDO('mysql:host=localhost;dbname=soy_yo;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'soy_yo';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
           // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } 
        catch (Exception $e) {
            echo(var_dump($e));
        }
    }

    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM product ORDER BY id_collection ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getProductByName($name){
        $query = $this->db->prepare('SELECT * FROM product WHERE `name` = ?');
        $query->execute(array($name));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Agrega una tupla de la tabla product a partir de 3 parametros
     
    public function save($name, $cost, $idCollection) {
        $query = $this->db->prepare('INSERT INTO product (`name`, cost, id_collection) VALUES (?, ?, ?)');
        return $query->execute([$name, $cost, $idCollection]);
    }

    //Elimina una tupla de la tabla product a partir de un id pasado x parametro
    
    function deleteProductDB($id) {
        $query = $this->db->prepare('DELETE FROM `product` WHERE `id_product`= ?');
        return $query->execute([$id]);
    }

    public function editProductDB($id, $name, $cost, $collection){
        $query = $this->db->prepare('UPDATE `product` SET `name`= ? , `cost`= ?, `id_collection`= ?  WHERE `id_product` = ?');
        return $query->execute([$name,$cost,$collection,$id]);
    }
}