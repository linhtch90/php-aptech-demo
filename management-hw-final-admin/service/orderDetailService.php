<?php

include "../model/orderDetail.php";
include "dbConn.php";


function getAllOrderDetails() {
    global $db;
    $query = "select * from orderdetails";
    $orderDetails = $db->query($query);
    return $orderDetails;
}

function getOrderDetailById($id) {
    global $db;
    $query = "select * from orderdetails where Id = '{$id}'";
    $orderDetail = $db->query($query)->fetch();
    return $orderDetail;
}

function getAllOrderDetailByOrderId($id) {
    global $db;
    $query = "select * from orderdetails where OrderId = '{$id}'";
    $orderDetails = $db->query($query);
    return $orderDetails;
}

function insertOrderDetail($orderDetail) {
    global $db;
    $query = "insert into orderdetails (OrderId, ProductId, Quantity) values ('{$orderDetail->getOrderId()}', '{$orderDetail->getProductId()}', '{$orderDetail->getQuantity()}')";
    $result = $db->exec($query);
    return $result;
}

function updateOrderDetail($orderDetail, $id) {
    global $db;
    $query = "update orderdetails set OrderId = '{$orderDetail->getOrderId()}', ProductId = '{$orderDetail->getProductId()}', Quantity = '{$orderDetail->getQuantity()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteOrderDetail($id) {
    global $db;
    $query = "update orderdetails set Deleted = '1' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>