<?php

include "connect_db.php";

function getBatches() {
    global $db;
    $query = "select * from batches";
    $stm = $db->prepare($query);
    $stm->execute();
    $result = $stm->fetchAll();
    $stm->closeCursor();
    return $result;
}

function insertBatch($batchName) {
    global $db;
    $query = "insert into batches (BatchName) values (':batchName')";
    $stm = $db->prepare($query);
    $stm->bindValue(':batchName', $batchName);
    $stm->execute();
    $result = $stm->rowCount();
    $stm->closeCursor();
    return $result;
}

function updateBatch($id, $batchName) {
    global $db;
    $query = "update batches set BatchName = ':batchName' where Id = ':id'";
    $stm = $db->prepare($query);
    $stm->bindValue(':batchName', $batchName);
    $stm->bindValue(':id', $id);
    $stm->execute();
    $result = $stm->rowCount();
    $stm->closeCursor();
    return $result;
}

function deleteBatch($id) {
    global $db;
    $query = "delete from batches where Id = ':id'";
    $stm = $db->prepare($query);
    $stm->bindValue(':id', $id);
    $stm->execute();
    $result = $stm->rowCount();
    $stm->closeCursor();
    return $result;
}
?>