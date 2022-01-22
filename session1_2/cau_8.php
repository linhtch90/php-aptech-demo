<?php
$result = "";
if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]) && isset($_POST["d"])) {
    $a = (float)$_POST["a"];
    $b = (float)$_POST["b"];
    $c = (float)$_POST["c"];
    $d = (float)$_POST["d"];

    $delta = (float)pow($b, 2) - 3 * $a * $c;
    $k = (float)(9 * $a * $b * $c - 2 * pow($b, 3) - 27 * pow($a, 2) * $d) / (2 * sqrt(abs(pow($delta, 3))));

    if ($delta > 0) {
        if (abs($k) <= 1) {
            $x1 = (2 * sqrt($delta) * cos((acos($k) / 3)) - $b) / (3 * $a);
            $x2 = (2 * sqrt($delta) * cos((acos($k) / 3 - (2 * M_PI / 3))) - $b) / (3 * $a);
            $x3 = (2 * sqrt($delta) * cos((acos($k) / 3 + (2 * M_PI / 3))) - $b) / (3 * $a);
            $result = "x1 = " . $x1 . "; x2 = " . $x2 . "; x3 = " . $x3;
        } else {
            $x0 = ((sqrt($delta) * abs($k)) / (3 * $a * $k)) * (pow(abs($k) + sqrt(pow($k, 2) - 1), 1 / 3) + pow(abs($k) - sqrt(pow($k, 2) - 1), 1 / 3)) - ($b / (3 * $a));
            $result = "x = " . $x0;
        }
    }

    if ($delta = 0) {
        $X = (-$b + pow(pow($b, 3) - 27 * pow($a, 2) * $d, 1 / 3)) / (3 * $a);
        $result = "x = " . $X;
    }
    if ($delta < 0) {
        $x = (sqrt(abs($delta)) / (3 * $a)) * (pow($k + sqrt(pow($k, 2) + 1), 1 / 3) + pow($k - sqrt(pow($k, 2) + 1), 1 / 3)) - ($b / (3 * $a));
        $result = "x = " . $x;
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
        <input type="text" name="a"> x^3 + <input type="text" name="b"> x^2 + <input type="text" name="c"> x + <input type="text" name="d"> = 0<br />
        <button type="submit">Find "x"</button><br />
    </form>
    <?php echo $result ?>

</body>

</html>