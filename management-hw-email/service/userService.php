<?php

include "../model/user.php";
include "dbConn.php";


function getAllUsers() {
    global $db;
    $query = "select * from user";
    $users = $db->query($query);
    return $users;
}

function getUserByEmail($email) {
    global $db;
    $query = "select * from user where Email = '{$email}'";
    $user = $db->query($query)->fetch();
    return $user;
}

function insertUser($user) {
    global $db;
    $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    $user->setPassword($hashedPassword);
    $query = "insert into user (Email, Password, VerificationCode) values ('{$user->getEmail()}', '{$user->getPassword()}', '{$user->getVerificationCode()}')";
    $result = $db->exec($query);
    return $result;
}

function updateUserActivated($email) {
    global $db;    
    $query = "update user set Activated = '1' where Email = '{$email}'";
    $result = $db->exec($query);
    return $result;
}

// function updateSupplier($supplier, $id) {
//     global $db;
//     $query = "update suppliers set Name = '{$supplier->getName()}', Email = '{$supplier->getEmail()}', PhoneNumber = '{$supplier->getPhoneNumber()}', Address = '{$supplier->getAddress()}' where Id = '{$id}'";
//     $result = $db->exec($query);
//     return $result;  
// }

// function deleteSupplier($id) {
//     global $db;
//     $query = "delete from suppliers where Id = '{$id}'";
//     $result = $db->exec($query);
//     return $result;
// }

function validateUser($inputUser) {
    $user = getUserByEmail($inputUser->getEmail());
    if ($user !== null && password_verify($inputUser->getPassword(), $user["Password"])) {
        return true;
    } else {
        return false;
    }
}

function sendEmail($user) {
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
    $header["To"] = $user->getEmail();
    $header["Subject"] = "Verification Code";

    $mailListPrivate = $user->getEmail();

    $body = "Your verification code: " . $user->getVerificationCode();

    // $mailListPrivate is optional
    $result = $mail->send($mailListPrivate, $header, $body);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
