<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="display.php" method="POST">
        <input type="text" name="mytext"><br />
        <input type="number" name="mynumber"><br />
        <input type="date" name="mydate"><br />
        <input type="password" name="mypassword"><br />
        <input type="radio" name="gender" value="men">Men<br />
        <input type="radio" name="gender" value="women">Women<br />
        <input type="checkbox" name="music" value="jazz">Jazz<br />
        <input type="checkbox" name="football" value="Arsenal">Arsenal<br />
        <input type="checkbox" name="film" value="Midway">Midway<br />
        <select name="address">
            <option value="dn">Danang</option>
            <option value="hn">Hanoi</option>
            <option value="sg">Saigon</option>
        </select>
        <button type="submit">Send</button>

    </form>
</body>
</html>