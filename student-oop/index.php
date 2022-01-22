<?php

include "./model/studentEntity.php";
include "./view/listStudentView.php";

global $studentList;

if (!isset($_GET["action"])) {
    header("Location: ./view/listStudentView.php");
} else if ($_GET["action"] == "addstudentview") {
    header("Location: ./view/addStudentView.php");
} else if ($_GET["action"] == "addstudent") {
    if (isset($_POST["studentName"]) && isset($_POST["phoneNumber"]) && isset($_POST["batchSelection"])) {
        
        $newStudent = new Student($_POST["studentName"], $_POST["phoneNumber"], $_POST["batchSelection"]);
        array_push($studentList, $newStudent);
    }
}

?>