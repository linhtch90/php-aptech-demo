<?php

$studentList = array();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Student Management OOP</title>
</head>
<body>
    <h3>Student List</h3><br />
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Batch</th>
        </tr>
        <?php if (count($studentList) > 0) {
            foreach ($studentList as $studentItem) {
                echo ("<tr>
                <td>$studentItem->getId()</td>
                <td>$studentItem->getName()</td>
                <td>$studentItem->getPhoneNumber()</td>
                <td>$studentItem->getBatchName()</td>
                </tr>");
            }
        } ?>
        <a href="../index.php?action=addstudentview">Add Student</a>
        <a>Update Student</a>
        <a>Remove Student</a>        
    </table>
</body>
</html>
