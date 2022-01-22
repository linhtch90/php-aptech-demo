<?php
$dns = "mysql:host=localhost;dbname=loginsessiondb";
$username = "root";
$password = "";

try {
    $conn = new PDO($dns, $username, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>