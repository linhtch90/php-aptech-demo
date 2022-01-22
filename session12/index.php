<?php

$name_cookie = "mycookie";
$value_cookie = "abc123";
$expire = strtotime("+1 month");
$path = "/";

setcookie($name_cookie, $value_cookie, $expire, $path);


?>