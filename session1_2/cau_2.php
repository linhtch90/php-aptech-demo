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
        <label>Enter a number </label>
        <input type="text" name="input_string">
        <button type="submit">Print</button>
    </form>
    <?php if (isset($_POST["input_string"])) {
        $num = (int)$_POST["input_string"];
        if ($num > 0) {
            for ($i = 1; $i <= $num; $i++) {
                echo str_repeat("*", $i) . "<br />";
            }
        } 
    } ?>
</body>

</html>