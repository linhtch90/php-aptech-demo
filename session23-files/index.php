<?php

if (is_file("demo.txt")) {
    echo "Demo.txt is a file</br>";
    echo getcwd() . "</br>";
    $data = file("demo.txt");
    foreach ($data as $dataLine) {
        echo $dataLine;
    }
}

?>