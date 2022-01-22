<?php

include "Mail.php";

$config = array();
$config["host"] = "ssl://smtp.gmail.com";
$config["port"] = 465;
$config["auth"] = true;
$config["username"] = "khantn.php@gmail.com";
$config["password"] = "kha123456789";

$mail = Mail::factory("smtp", $config);

$header = array();

$header["From"] = "khantn.php@gmail.com";
$header["To"] = "mailto:linhtch90@gmail.com";
$header["Subject"] = "This is a sample subject";

$mailListPrivate = "linhtch90@gmail.com";

$body = "This is a sample content";

// $mailListPrivate is optional
// $result = $mail->send($mailListPrivate, $header, $body);
$result = $mail->send($mailListPrivate, $header, $body);

if ($result) {
    echo "Send mail successfully";
} else {
    echo $result->getMessage();
}

?>