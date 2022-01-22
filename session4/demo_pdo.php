<?php

$dns = "mysql:host=localhost;dbname=data_batch161";
$username = "root";
$password = "";

try {
    $db = new PDO($dns, $username, $password);
    echo "Successful connection... <br />";
} catch (PDOException $ex) {
    echo "Failed connection... <br />";
    echo $ex->getMessage();
}

$query = "select * from batches";

$batches = $db->query($query);
foreach ($batches as $batch) {
    echo $batch["batchName"] . "<br />";
}



?>