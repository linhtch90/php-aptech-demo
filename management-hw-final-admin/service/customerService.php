<?php

include "../model/customer.php";
include "dbConn.php";


function getAllCustomers() {
    global $db;
    $query = "select * from customers";
    $customers = $db->query($query);
    return $customers;
}

function getCustomerById($id) {
    global $db;
    $query = "select * from customers where Id = '{$id}'";
    $customer = $db->query($query)->fetch();
    return $customer;
}

function insertCustomer($customer) {
    global $db;
    $query = "insert into customers (Id, FirstName, LastName, PhoneNumber, Address, Email, Birthday) values ('{$customer->getId()}', '{$customer->getFirstName()}', '{$customer->getLastName()}', '{$customer->getPhoneNumber()}', '{$customer->getAddress()}', '{$customer->getEmail()}', '{$customer->getBirthday()}')";
    $result = $db->exec($query);
    return $result;
}

function updateCustomer($customer, $id) {
    global $db;
    $query = "update customers set FirstName = '{$customer->getFirstName()}', LastName = '{$customer->getLastName()}', PhoneNumber = '{$customer->getPhoneNumber()}', Address = '{$customer->getAddress()}', Email = '{$customer->getEmail()}', Birthday = '{$customer->getBirthday()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteCustomer($id) {
    global $db;
    $query = "delete from customers where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>