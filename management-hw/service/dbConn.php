<?php

$dns = "mysql:host=localhost;dbname=storemanagementdb";
$username = "root";
$password = "";

try {
    $db = new PDO($dns, $username, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>