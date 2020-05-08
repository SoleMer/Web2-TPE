<?php

function connect(){
    return new PDO('mysql:host=localhost;'.'dbname=soy_yo;charset=utf8','root','');
}

function getProducts(){
    //$db es un objeto php que crea un acceso a la ddbb
    $db=connetct();
    $query = $db->prepare('SELECT * FROM producto');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}