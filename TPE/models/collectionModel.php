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

    /**
     * @return array
     * Retorna todas las tareas guardadas en la tabla producto
    **/
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM collection ORDER BY id_collection ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCollectionByName($name){
        $query = $this->db->prepare('SELECT * FROM `collection` WHERE `name` = ?');
        $query->execute(array($name));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //ANGREGA NUEVA COLECION
    public function save($name) {
        $query = $this->db->prepare('INSERT INTO `collection` (`name`) VALUES (?)');
        return $query->execute([$name]);
    }

    function deleteCollectionDB($id) {
        $query = $this->db->prepare('DELETE FROM `collection` WHERE `id_collection`= ?');
        return $query->execute([$id]);
    }

    public function editCollectionDB($id, $name){
        $query = $this->db->prepare('UPDATE `collection` SET `name`= ?  WHERE `id_collection` = ?');
        return $query->execute([$name,$id]);
    }
}