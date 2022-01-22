<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <title>Homepage</title>
</head>
<body>
    <?php 
    if (isset($_SESSION["username"]) && isset($_SESSION["email"])) { ?>
    <p>Welcome username: <?php echo($_SESSION["username"]) ?> </p>
    <p>Your email: <?php echo($_SESSION["email"]) ?> </p>
    <a href="./logout.php">Logout</a>
    <?php } else {
    ?>
    <a href="./login.php">Please Login first!</a>
    <?php } ?>
</body>
</html>