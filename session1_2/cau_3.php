<?php
session_start();
$message = "";
if ((isset($_POST["input_username"])) && (isset($_POST["input_password"]))) {
    $username = $_POST["input_username"];
    $password = $_POST["input_password"];
    if ((strcmp($username, "admin") != 0) || (strcmp($password, "root") != 0)) {
        $_SESSION["count"] += 1;
        if ($_SESSION["count"] == 3) {
            $message = "Access is blocked...";
            $_SESSION["count"] = 0;
        }
    } else {
        $message = "Sign in successfully...";
        $_SESSION["count"] = 0;
    }
} ?>

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
        <label>Username </label>
        <input type="text" name="input_username"><br />
        <label>Password </label>
        <input type="password" name="input_password"><br />
        <button type="submit">Sign In</button><br />
        <?php echo $message ?>
    </form>

</body>

</html>