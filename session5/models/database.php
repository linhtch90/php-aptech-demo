<?php

$dns = "mysql:host=localhost;dbname=data_batch161";
$username = "root";
$password = "";

try {
    $db = new PDO($dns, $username, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>