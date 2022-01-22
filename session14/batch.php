<?php

class Batch {
    const DESCRIPTION = "aptech";

    public $id;
    public $batchname;

    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }

    public function showDes() {
        return self::DESCRIPTION;
    }

}

?>