<?php

if (isset($_FILES['imageproduct'])) {
    if ($_FILES['imageproduct']['tmp_name'] != null) {
        $filename = $_FILES['imageproduct']['name'];
        if (is_dir('images')) {
            $path = 'images/' . $filename;
            if (move_uploaded_file($_FILES['imageproduct']['tmp_name'], $path)) {
                include "connectdb.php";
                $productname = $_POST['productname'];
                $price = $_POST['price'];
                
            }
        }
    }
}

?>