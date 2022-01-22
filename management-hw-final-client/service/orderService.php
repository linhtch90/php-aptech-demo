<?php

include "../model/order.php";
include "dbConn.php";


function getAllOrders() {
    global $db;
    $query = "select * from orders";
    $orders = $db->query($query);
    return $orders;
}

function getOrderById($id) {
    global $db;
    $query = "select * from orders where Id = '{$id}'";
    $order = $db->query($query)->fetch();
    return $order;
}

function insertOrder($order) {
    global $db;
    $query = "insert into orders (CreatedDate, ShippedDate, Status, Description, ShippingAddress, ShippingCity, PaymentType, CustomerId, EmployeeId) values ('{$order->getCreatedDate()}', '{$order->getShippedDate()}', '{$order->getStatus()}', '{$order->getDescription()}', '{$order->getShippingAddress()}', '{$order->getShippingCity()}', '{$order->getPaymentType()}', '{$order->getCustomerId()}', '{$order->getEmployeeId()}')";
    $result = $db->exec($query);
    return $result;
}

function insertOrderTemp($order) {
    global $db;
    $query = "insert into orders (CreatedDate, ShippedDate, Status, Description, ShippingAddress, ShippingCity, PaymentType, CustomerId, EmployeeId, Deleted) values ('{$order->getCreatedDate()}', '{$order->getShippedDate()}', '{$order->getStatus()}', '{$order->getDescription()}', '{$order->getShippingAddress()}', '{$order->getShippingCity()}', '{$order->getPaymentType()}', '{$order->getCustomerId()}', '{$order->getEmployeeId()}', '1')";
    $result = $db->exec($query);
    return $result;
}

function updateOrder($order, $id) {
    global $db;
    $query = "update orders set CreatedDate = '{$order->getCreatedDate()}', ShippedDate = '{$order->getShippedDate()}', Status = '{$order->getStatus()}', Description = '{$order->getDescription()}', ShippingAddress = '{$order->getShippingAddress()}', ShippingCity = '{$order->getShippingCity()}', PaymentType = '{$order->getPaymentType()}', CustomerId = '{$order->getCustomerId()}', EmployeeId = '{$order->getEmployeeId()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteOrder($id) {
    global $db;
    $query = "update orders set Deleted = '1' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

function getLastestOrderId() {
    global $db;
    $query = "select Id from orders order by Id desc limit 1";
    $result = $db->query($query)->fetch();
    return $result["Id"];
}

function resetOrder($id) {
    global $db;
    $query = "update orders set Deleted = '0' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>