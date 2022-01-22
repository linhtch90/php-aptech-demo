<?php

include "../models/student_db.php";
include "../models/batch_db.php";

$student = get_student_by_id($_GET["studentId"]);
$batches = get_batches();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update student detail</title>
</head>

<body>

    <form action="../index.php?action=updatestudentdetail" method="POST">
        <input type="hidden" name="studentId" value="<?php echo $student[0] ?>"/><br />
        <label>Name:</label>
        <input type="text" name="studentName" value="<?php echo $student[1] ?>"> <br />
        <label>Phone:</label>
        <input type="text" name="phoneNumber" value="<?php echo $student[2] ?>"> <br />
        <label>Batch:</label>
        <select name="batchSelection">

            <?php
            foreach ($batches as $batch) {
                if ($batch[0] == $student[3]) {
                echo "<option value=" . $batch[0] . " selected = 'selected' >$batch[1]</option>";

                } else {
                    echo "<option value=" . $batch[0] . ">$batch[1]</option>";
                }
            }
            ?>

        </select><br />
        <button type="submit">Update Student Info</button>
    </form>

</body>

</html>