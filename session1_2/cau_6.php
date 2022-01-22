<?php
$result = "";
if (isset($_POST["a"]) && isset($_POST["b"])) {
    $a = (float)$_POST["a"];
    $b = (float)$_POST["b"];
    if ($a == '') {
        $result = 'Please input value for the first parameter';
    } else if ($b == '') {
        $result = 'Please input value for the second parameter';
    } else if ($a == 0) {
        $result = 'First parameter must be different from zero';
    } else {
        $result = "x = ";
        $result .= - ($b) / $a;
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
        <input type="text" name="a"> x + <input type="text" name="b"> = 0<br />
        <button type="submit">Find "x"</button><br />
    </form>
    <?php echo $result ?>

</body>

</html>