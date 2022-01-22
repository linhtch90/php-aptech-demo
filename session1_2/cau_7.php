<?php
$result = "";
if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"])) {
    $a = (float)$_POST["a"];
    $b = (float)$_POST["b"];
    $c = (float)$_POST["c"];
    if ($a == 0) {
        if ($b == 0) {
            $result = "Impossible equation...";
        } else {
            $result = "x = ";
            $result .= - ($c) / $b;
        }
    } else {
        $delta = $b * $b - 4 * $a * $c;
        $x1 = "";
        $x2 = "";        
        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            $result = "x1 = " . $x1 . " and x2 = " . $x2;
        } else if ($delta == 0) {
            $x1 = (-$b / (2 * $a));
            $result = "x1 = x2 = " . $x1;
        } else {
            $result = "Impossible equation...";
        }
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
        <input type="text" name="a"> x^2 + <input type="text" name="b"> x + <input type="text" name="c"> = 0<br />
        <button type="submit">Find "x"</button><br />
    </form>
    <?php echo $result ?>

</body>

</html>