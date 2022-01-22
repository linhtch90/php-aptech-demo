<?php

include "./models/student_db.php";

if (!isset($_GET["action"])) {
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "listallstudentsview") {
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "addstudentview") {
    header("Location: ./views/add_student.php");
} else if ($_GET["action"] == "addstudent") {
    if (isset($_POST["studentName"]) && isset($_POST["phoneNumber"]) && isset($_POST["batchSelection"])) {
        
        $result = insert_student($_POST["studentName"], $_POST["phoneNumber"], $_POST["batchSelection"]);
        
    }
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "removestudentview") {
    header("Location: ./views/remove_student.php");
} else if ($_GET["action"] == "removestudent") {
    if (isset($_POST["studentSelection"])) {

        $result = delete_student($_POST["studentSelection"]);

    }
    header("Location: ./views/list_student.php");
} else if ($_GET["action"] == "updatestudentview") {
    header("Location: ./views/update_student.php");
} else if ($_GET["action"] == "updatestudent") {
    if (isset($_POST["studentSelection"])) {

        $selectedStudent = $_POST["studentSelection"];
        header("Location: ./views/detail_student.php?studentId=".$_POST["studentSelection"]);

    } else {
        header("Location: ./views/list_student.php");
    }
} else if ($_GET["action"] == "updatestudentdetail") {
    if (isset($_POST["studentId"]) && isset($_POST["studentName"]) && isset($_POST["phoneNumber"]) && isset($_POST["batchSelection"])) {

        $result = update_student($_POST["studentId"], $_POST["studentName"], $_POST["phoneNumber"], $_POST["batchSelection"]);

    }
    header("Location: ./views/list_student.php");

}

?>
