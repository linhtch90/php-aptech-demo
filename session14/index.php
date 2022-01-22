<?php

include "batch.php";

$batch161 = new Batch();
$batch161->id = 1;
$batch161->batchname = "Batch 161";
$batch161->showDes();
echo Batch::DESCRIPTION;

?>