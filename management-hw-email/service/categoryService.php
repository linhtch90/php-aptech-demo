<?php

include "../model/category.php";
include "dbConn.php";


function getAllCategories() {
    global $db;
    $query = "select * from categories";
    $categories = $db->query($query);
    return $categories;
}

function getCategoryById($id) {
    global $db;
    $query = "select * from categories where Id = '{$id}'";
    $category = $db->query($query)->fetch();
    return $category;
}

function insertCategory($category) {
    global $db;
    $query = "insert into categories (Name, Description) values ('{$category->getName()}', '{$category->getDescription()}')";
    $result = $db->exec($query);
    return $result;
}

function updateCategory($category, $id) {
    global $db;
    $query = "update categories set Name = '{$category->getName()}', Description = '{$category->getDescription()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteCategory($id) {
    global $db;
    $query = "delete from categories where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>