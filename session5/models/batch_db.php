<?php

include "database.php";

function get_batches() {
    global $db;
    $query = "select * from batches";
    $batches = $db->query($query);
    return $batches;
}

function insert_batch($batchName) {
    global $db;
    $query = "insert into batches (batchName) values ('$batchName')";
    $insert_count = $db->exec($query);
    return $insert_count;
}

function delete_batch($batchId) {
    global $db;
    $query = "delete from batches where batchId = '$batchId'";
    $delete_count = $db->exec($query);
    return $delete_count;
}

?>