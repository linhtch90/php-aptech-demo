<?php

include "../models/studentEntity.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove student</title>
</head>
<body>
    <form action="../index.php?action=removestudent" method="POST">

        <label >Select student: </label>
        <select name="studentSelection" >
            
            <?php
                foreach ($_SESSION["studentList"] as $student) {
                    echo "<option value=" . $student->getName() . ">" . $student->getName() . "</option>";
                } 
            ?>

        </select><br/>
        <button type="submit">Remove</button>
    </form>
</body>
</html>