<?php


include "./models/student_db.php";
include "./models/studentEntity.php";
session_start();

if (isset($_SESSION["studentList"]) == false) {
    $_SESSION["studentList"] = [];
    $_SESSION["studentList"][] = new Student("Long", "1234567890", "Batch 161");
}

if (!isset($_GET["action"])) {
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "listallstudentsview") {
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "addstudentview") {
    header("Location: ./views/add_student.php");
} else if ($_GET["action"] == "addstudent") {
    if (isset($_POST["studentName"]) && isset($_POST["phoneNumber"]) && isset($_POST["batchSelection"])) {
        
        $_SESSION["studentList"][] = new Student($_POST["studentName"], $_POST["phoneNumber"], $_POST["batchSelection"]);
        
    }
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "removestudentview") {
    header("Location: ./views/remove_student.php");
} else if ($_GET["action"] == "removestudent") {
    if (isset($_POST["studentSelection"])) {

        foreach ($_SESSION["studentList"] as $student) {
            if ($student->getName() == $_POST["studentSelection"]) {
                $index = array_search($student, $_SESSION["studentList"]);
                unset($_SESSION["studentList"][$index]);
            }
        }

    }
    header("Location: ./views/list_student.php");
} 

?>
