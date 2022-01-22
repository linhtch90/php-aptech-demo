<?php

if (isset($_COOKIE["mycookie"])) {
    echo $_COOKIE["mycookie"];
} else {
    echo "Non cookie";
}

?>