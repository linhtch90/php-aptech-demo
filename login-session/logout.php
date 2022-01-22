<?php

session_start();

unset($_SESSION["userId"]);
unset($_SESSION["username"]);
unset($_SESSION["userpassword"]);
header("Location: index.php")

?>