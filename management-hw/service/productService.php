<?php

include "../model/product.php";
include "dbConn.php";


function getAllProducts() {
    global $db;
    $query = "select * from products";
    $products = $db->query($query);
    return $products;
}

function getProductById($id) {
    global $db;
    $query = "select * from products where Id = '{$id}'";
    $product = $db->query($query)->fetch();
    return $product;
}

function insertProduct($product) {
    global $db;
    $query = "insert into products (Name, Price, Discount, Stock, CategoryId, SupplierId, Description) values ('{$product->getName()}', '{$product->getPrice()}', '{$product->getDiscount()}', '{$product->getStock()}', '{$product->getCategoryId()}', '{$product->getSupplierId()}', '{$product->getDescription()}')";
    $result = $db->exec($query);
    return $result;
}

function updateProduct($product, $id) {
    global $db;
    $query = "update products set Name = '{$product->getName()}', Price = '{$product->getPrice()}', Discount = '{$product->getDiscount()}', Stock = '{$product->getStock()}', CategoryId = '{$product->getCategoryId()}', SupplierId = '{$product->getSupplierId()}', Description = '{$product->getDescription()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteProduct($id) {
    global $db;
    $query = "delete from products where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>