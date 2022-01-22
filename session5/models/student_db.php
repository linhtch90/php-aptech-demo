<?php

include "../models/database.php";

function get_students() {
    global $db;
    $query = "select * from students";
    $batches = $db->query($query);
    return $batches;
}

function insert_student($studentName, $phoneNumber, $batchId) {
    global $db;
    $query = "insert into students (studentName, phoneNumber, batchId) values ('$studentName', '$phoneNumber', '$batchId')";
    $insert_count = $db->exec($query);
    return $insert_count;
}

function delete_student($studentId) {
    global $db;
    $query = "delete from batches where studentId = '$studentId'";
    $delete_count = $db->exec($query);
    return $delete_count;
}

?>