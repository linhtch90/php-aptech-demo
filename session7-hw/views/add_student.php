<?php

include "../models/batch_db.php";

$batches = get_batches();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
</head>
<body>
    <form action="../index.php?action=addstudent" method="POST">
        <label >Name:</label>
        <input type="text" name="studentName"> <br/>
        <label >Phone:</label>
        <input type="text" name="phoneNumber"> <br/>
        <label >Batch:</label>
        <select name="batchSelection" >
            
            <?php
                foreach ($batches as $batch) {
                    echo "<option value=" . $batch[0] . ">$batch[1]</option>";
                } 
            ?>

        </select><br/>
        <button type="submit">Add</button>
    </form>
</body>
</html>