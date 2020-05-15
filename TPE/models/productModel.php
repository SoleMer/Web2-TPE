<?php

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('INSERTAR DDBB', 'root', '');
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'soy_yo';

        try {
            $this->db = new PDO("DDBB", $userName, $password);
            
            // Solo en modo desarrollo
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
        $query = $this->db->prepare('SELECT * FROM product ORDER BY id_collection ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
