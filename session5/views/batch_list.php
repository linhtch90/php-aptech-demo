<?php

include "../models/batch_db.php";
include "../models/student_db.php";

$batchlist = get_batches();

foreach ($batchlist as $batch) {
    echo $batch[1] . "<br />";
}

$studentlist = get_students();

foreach ($studentlist as $student) {
    echo $student[1] . " - " . $student[2] . "<br />";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="http://localhost/php-batch161/session5/index.php?action=addbatchview">To Add Batch</a>
</body>
</html>

