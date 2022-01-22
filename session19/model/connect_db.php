<?php
$dns = "mysql:host=localhost;dbname=batch161db";
$username = "root";
$password = "";
$option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $conn = new PDO($dns, $username, $password, $option);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>