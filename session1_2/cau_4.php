<?php
$message = "";
if (isset($_POST["input_age"])) {
    $age = (int)$_POST["input_age"];
    if ($age >= 18) {
        $message = "Valid for voting";
    } else {
        $message = "Invalid for voting";
    }
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
    <form action="" method="POST">
        <label>Age </label>
        <input type="text" name="input_age"><br />        
        <button type="submit">Age Check</button><br />
        <?php echo $message ?>
    </form>

</body>

</html>