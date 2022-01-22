<?php
$message = "";
if (isset($_POST["input_math"]) && isset($_POST["input_phys"]) && isset($_POST["input_chem"])) {
    $math = (float)$_POST["input_math"];
    $phys = (float)$_POST["input_phys"];
    $chem = (float)$_POST["input_chem"];
    if ($math >= 7.0 && $phys >= 7.0 && $chem >= 7.0) {
        $message = "Passed";
    } else {
        $message = "Failed";
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
        <label>Math </label>
        <input type="text" name="input_math"><br />
        <label>Phys </label>
        <input type="text" name="input_phys"><br />
        <label>Chem </label>
        <input type="text" name="input_chem"><br />        
        <button type="submit">Result</button><br />
        <?php echo $message ?>
    </form>

</body>

</html>