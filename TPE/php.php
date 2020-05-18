<?php

foreach ($collections as $collection) {
    <h1>$collection</h1>
    <ul>
    foreach ($products as $product) {
        if ($product->id_collection === collection->id_collection) {
            <li>$product->name</li>
            <li>$product->cost</li>
        }
    }
    </ul>
}


?>