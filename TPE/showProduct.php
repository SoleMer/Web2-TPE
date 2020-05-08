<?php

require_once('db.php');

function showProduct(){
    $products = getProducts();

    $html = <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de productos</title>
    </head>
    <body>
        <h1>Lista de productos</h1>
        <ul>;

        foreach($products as $product){
            $html .= '<li>';
            $html .= $product->nombre;
            $html .= '</li>';
        }
    
        html .= </ul>
    </body>
    </html>;

    return $html;
}