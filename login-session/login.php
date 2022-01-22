<?php

include "dbconnect.php";

session_start();

global $conn;
$message = "";
if (count($_POST) > 0) {
    $query = "select * from usertbl where username = '" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'";
    $result = $conn->query($query)->fetch();

    if (is_array($result)) {
        $_SESSION["userId"] = $result["id"];
        $_SESSION["username"] = $result["username"];
        $_SESSION["email"] = $result["email"];
    } else {
        $message = "Invalid account";
    }

    if (isset($_SESSION["userId"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) {
        header("Location: index.php");
    }
}

?>

<html>

<head>
    <title>User Login</title>
</head>

<body>
    <form name="frmUser" method="post" action="" align="center">
        <div class="message"><?php if ($message != "") {
                                    echo $message;
                                } ?></div>
        <h3 align="center">Enter Login Details</h3>
        Username:<br>
        <input type="text" name="username">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset">
    </form>
</body>

</html>