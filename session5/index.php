<?php

include "./models/batch_db.php";

// if (!isset($_GET["action"])) {
//     header("Location: ./views/batch_list.php");
// } else if ($_GET["action"] == "addbatchview") {
//     header("Location: ./views/batch_add.php");
// } else if ($_GET["action"] == "addbatch") { 
//     if (isset($_POST["batchname"])) {
//     $result = insert_batch($_POST["batchname"]);
//     if ($result > 0) {
//         header("Location: ./views/batch_list.php");
//     }
//     }
// }


if (!isset($_GET["action"])) {
    header("Location: ./views/batch_list.php");
} else if ($_GET["action"] == "addbatchview") {
    header("Location: ./views/batch_add.php");
} else if ($_GET["action"] == "batchadd" && isset($_POST["batchname"])) {
    $result = insert_batch($_POST["batchname"]);
    if ($result > 0) {
        header("Location: ./views/batch_list.php");
    } else {
        header("Location ./views/batch_add.php");
    }
}



?>