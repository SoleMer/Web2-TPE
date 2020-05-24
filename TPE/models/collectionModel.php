<?php

class CollectionModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=soy_yo;charset=utf8', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'soy_yo';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    
    //Retorna todas las colecciones guardadas en la tabla collection
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM collection ORDER BY id_collection ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //Retorna la colección que coincide con el nombre recibido por parámetro
    public function getCollectionByName($name){
        $query = $this->db->prepare('SELECT * FROM `collection` WHERE `name` = ?');
        $query->execute(array($name));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //Agrega una nueva colección a la DDBB
    public function save($name) {
        $query = $this->db->prepare('INSERT INTO `collection` (`name`) VALUES (?)');
        return $query->execute([$name]);
    }

    //Elimina una colección recibida por parámetro de la base de datos
    function deleteCollectionDB($id) {
        $query = $this->db->prepare('DELETE FROM `collection` WHERE `id_collection`= ?');
        return $query->execute([$id]);
    }

    //Edita una colección en la DDBB
    public function editCollectionDB($id, $name){
        $query = $this->db->prepare('UPDATE `collection` SET `name`= ?  WHERE `id_collection` = ?');
        return $query->execute([$name,$id]);
    }
}