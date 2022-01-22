<?php
// $username = $_GET["username"];
// $password = $_GET["password"];
$username = "";
$password = "";
if (isset($_POST["username"])) {
    $username = $_POST["username"];
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
}

echo $username . "<br />" . $password;

?>