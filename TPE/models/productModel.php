<?php

class ProductModel {

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
    
    public function getProductById($id){
        $query = $this->db->prepare('SELECT * FROM product WHERE id_product === $id');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}