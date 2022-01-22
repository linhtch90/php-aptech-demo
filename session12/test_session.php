<?php

session_start();
if (isset($_SESSION["mysession"])) {
    echo $_SESSION["mysession"];
    $sessionName = session_name();
    $sessionId = session_id();
    echo $sessionName . " " . $sessionId;
} else {
    echo "none session";
}

?>