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

function getCustomerByEmail($email) {
    global $db;
    $query = "select * from customers where Email = '{$email}'";
    $customer = $db->query($query)->fetch();
    return $customer;
}

function insertCustomer($customer) {
    global $db;
    $hashedPassword = password_hash($customer->getPassword(), PASSWORD_DEFAULT);
    $customer->setPassword($hashedPassword);
    $query = "insert into customers (Id, FirstName, LastName, PhoneNumber, Address, Email, Birthday, Password, VerificationCode, Activated) values ('{$customer->getId()}', '{$customer->getFirstName()}', '{$customer->getLastName()}', '{$customer->getPhoneNumber()}', '{$customer->getAddress()}', '{$customer->getEmail()}', '{$customer->getBirthday()}', '{$customer->getPassword()}', '{$customer->getVerificationCode()}', '{$customer->getActivated()}')";
    $result = $db->exec($query);
    return $result;
}

function updateCustomerActivated($email) {
    global $db;    
    $query = "update customers set Activated = '1' where Email = '{$email}'";
    $result = $db->exec($query);
    return $result;
}

function validateCustomer($email, $password) {
    $customer = getCustomerByEmail($email);
    if ($customer !== null && password_verify($password, $customer["Password"])) {
        return true;
    } else {
        return false;
    }
}

function sendEmail($customer) {
    include "Mail.php";

    $config = array();
    $config["host"] = "ssl://smtp.gmail.com";
    $config["port"] = 465;
    $config["auth"] = true;
    $config["username"] = "khantn.php@gmail.com";
    $config["password"] = "kha123456789";

    $mail = Mail::factory("smtp", $config);

    $header = array();

    $header["From"] = "khantn.php@gmail.com";
    $header["To"] = $customer->getEmail();
    $header["Subject"] = "Verification Code";

    $mailListPrivate = $customer->getEmail();

    $body = "Your verification code: " . $customer->getVerificationCode();

    // $mailListPrivate is optional
    $result = $mail->send($mailListPrivate, $header, $body);

    if ($result) {
        return true;
    } else {
        return false;
    }
}



?>