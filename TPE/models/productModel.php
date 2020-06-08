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
        } 
        catch (Exception $e) {
            echo(var_dump($e));
        }
    }

    //Obtiene y retorna todos los productos guardados en la DDBB
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM product ORDER BY id_collection ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Obtiene un producto dela DDBB cuyo nombre coincide con el recibido por parámetro
    public function getProductByName($name){
        $query = $this->db->prepare('SELECT * FROM product WHERE `name` = ?');
        $query->execute(array($name));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // Agrega un producto a la DDBB
    public function save($name, $cost, $idCollection, $image = null) {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        
        $query = $this->db->prepare('INSERT INTO product (name, cost, id_collection, image) VALUES (?, ?, ?, ?)');
        return $query->execute([$name, $cost, $idCollection, $pathImg]);

    }

    private function uploadImage($image){
        $target = 'upload/products/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    //Elimina un producto a la DDBB a partir de un id pasado x parámetro
    function deleteProductDB($id) {
        $query = $this->db->prepare('DELETE FROM `product` WHERE `id_product`= ?');
        return $query->execute([$id]);
    }

    //Edita un producto de la DDBB
    public function editProductDB($id, $name, $cost, $collection){
        $query = $this->db->prepare('UPDATE `product` SET `name`= ? , `cost`= ?, `id_collection`= ?  WHERE `id_product` = ?');
        return $query->execute([$name,$cost,$collection,$id]);
    }
}