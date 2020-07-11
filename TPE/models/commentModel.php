<?php

class CommentModel {

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

    //OBTENER TODOS LOS COMENTARIOS DE LA DB
    public function getAllComments($id_product){
        $query = $this->db->prepare('SELECT * FROM comment WHERE id_product = ?');
        $response = $query->execute([$id_product]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENER TODOS LOS COMENTARIOS DE LA DB EN ORDEN ASCENDENTE
    public function getAllCommentsASC($id_product){
        $query = $this->db->prepare('SELECT * FROM comment WHERE id_product = ? ORDER BY score ASC');
        $response = $query->execute([$id_product]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENER TODOS LOS COMENTARIOS DE LA DB EN RDEN DESCENDENTE
    public function getAllCommentsDESC($id_product){
        $query = $this->db->prepare('SELECT * FROM comment WHERE id_product = ? ORDER BY score DESC');
        $response = $query->execute([$id_product]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //AGREGAR UN COMENTARIO A LA DB
    public function addComment($product, $user, $text, $score){
        $query = $this->db->prepare('INSERT INTO comment (id_product, user, text, score) VALUES (?, ?, ?, ?)');
        return $query->execute([$product, $user, $text, $score]);
    }

    //ELIMINAR UN COMENTARIO
    public function deleteComment($commentId){
        $query = $this->db->prepare('DELETE FROM comment WHERE id_comment = ?');
        return $query->execute([$commentId]);
    }
}

?>