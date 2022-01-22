<?php
$var_number = 5;
$var_double = 2.75;
$var_boolean = true;
$var_string = "Hello";
$var_empty = "";
$var_null = null;

define("PI", 3.14);

$a = $var_string . ": " . $var_number . "<br />";
echo $a;
$date_pattern = "d-m-Y";
echo date($date_pattern)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="getdata.php" method="POST">
        <label for="">Username</label>
        <input type="text" name="username">
        <label for="">Password</label>
        <input type="text" name="password">
        <button type="submit">Submit</button>
        
    </form>
</body>
</html>