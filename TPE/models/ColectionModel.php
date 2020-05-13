<?php

class ColectionModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('INSERTAR DDBB', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'soy_yo';

        try {
            $this->db = new PDO("DDBB", $userName, $password);
            
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    /**
     * @return array
     * Retorna todas las tareas guardadas en la tabla producto
    **/
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM coleccion ORDER BY id_coleccion ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
