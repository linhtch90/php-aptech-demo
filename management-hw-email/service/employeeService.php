<?php

include "../model/employee.php";
include "dbConn.php";


function getAllEmployees() {
    global $db;
    $query = "select * from employees";
    $employees = $db->query($query);
    return $employees;
}

function getEmployeeById($id) {
    global $db;
    $query = "select * from employees where Id = '{$id}'";
    $employee = $db->query($query)->fetch();
    return $employee;
}

function insertEmployee($employee) {
    global $db;
    $query = "insert into employees (Id, FirstName, LastName, PhoneNumber, Address, Email, Birthday) values ('{$employee->getId()}', '{$employee->getFirstName()}', '{$employee->getLastName()}', '{$employee->getPhoneNumber()}', '{$employee->getAddress()}', '{$employee->getEmail()}', '{$employee->getBirthday()}')";
    $result = $db->exec($query);
    return $result;
}

function updateEmployee($employee, $id) {
    global $db;
    $query = "update employees set FirstName = '{$employee->getFirstName()}', LastName = '{$employee->getLastName()}', PhoneNumber = '{$employee->getPhoneNumber()}', Address = '{$employee->getAddress()}', Email = '{$employee->getEmail()}', Birthday = '{$employee->getBirthday()}' where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;  
}

function deleteEmployee($id) {
    global $db;
    $query = "delete from employees where Id = '{$id}'";
    $result = $db->exec($query);
    return $result;
}

?>