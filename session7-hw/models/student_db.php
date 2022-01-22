<?php

include "connect_db.php";

function get_students() {
    global $db;
    $query = "select * from students";
    $students = $db->query($query);
    return $students;
}

function get_student_by_id($id) {
    global $db;
    $query = "select * from students where studentId = $id";
    $student = $db->query($query)->fetch();
    return $student;
}

function insert_student($studentName, $phoneNumber, $batchId) {
    global $db;
    $query = "insert into students (studentName, phoneNumber, batchId) values ('$studentName', '$phoneNumber', '$batchId')";
    $insert_count = $db->exec($query);
    return $insert_count;
}

function delete_student($studentId) {
    global $db;
    $query = "delete from students where studentId = '$studentId'";
    $delete_count = $db->exec($query);
    return $delete_count;
}

function update_student($studentId, $studentName, $phoneNumber, $batchId) {
    global $db;
    $query = "update students set studentName = '$studentName', phoneNumber = '$phoneNumber', batchId = '$batchId' where studentId = '$studentId'";
    $update_count = $db->exec($query);
    return $update_count;
}

?>