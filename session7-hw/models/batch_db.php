<?php

include "connect_db.php";

function get_batches() {
    global $db;
    $query = "select * from batches";
    $batches = $db->query($query);
    return $batches;
}

?>