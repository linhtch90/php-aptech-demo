<?php

$dns = "mysql:host=localhost;dbname=project_batch161_db";
$username = "root";
$password = "";

try {
    $db = new PDO($dns, $username, $password);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>