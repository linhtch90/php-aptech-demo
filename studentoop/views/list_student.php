<?php

include "../models/studentEntity.php";

echo "List of students:<br/>";
foreach ($_SESSION["studentList"] as $student) {
    echo $student->getId() . " - " . $student->getName() . " - " . $student->getPhoneNumber() . " - " . $student->getBatchName() . "<br/>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Student</title>
</head>
<body>
    <a href="../index.php?action=listallstudentsview">List all students</a><br/>
    
    <a href="../index.php?action=addstudentview">Add student</a><br/>    
    
    <a href="../index.php?action=removestudentview">Remove student</a><br/>    

    <!-- <a href="../index.php?action=updatestudentview">Update student</a><br/>     -->

</body>
</html>