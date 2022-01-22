<?php

include "../model/supplier.php";
include "dbConn.php";


function getAllSuppliers() {
    global $db;
    $query = "select * from suppliers";
    $suppliers = $db->query($query);
    return $suppliers;
}

function getSupplierById($id) {
    global $db;
    $query = "select * from suppliers where Id = '{$id}'";
    $supplier = $db->query($query)->fetch();
    return $supplier;
}

function insertSupplier($supplier) {
    global $db;
    $query = "insert into suppliers (Name, Email, PhoneNumber, Address) values ('{$supplier->getName()}', '{$supplier->getEmail()}', '{$supplier->getPhoneNumber()}', '{$supplier->getAddress()}')";
    $result = $db->exec($query);
    return $result;
}

function updateSupplier($supplier, $id) {
    global $db;
    $query = "update suppliers set Name = '{$supplier->getName()}', Email = '{$supplier->getEmail()}', PhoneNumber = '{$supplier->getPhoneNumber()}', Address = '{$supplier->getAddress()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteSupplier($id) {
    global $db;
    $query = "delete from suppliers where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>