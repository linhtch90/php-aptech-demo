<?php

session_start();

class Student {
    private $id;
    private $name;
    private $phoneNumber;
    private $batchName;

    private static $idIncreament = 1;

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setBatchName($batchName) {
        $this->batchName = $batchName;
    }
    
    public function getBatchName() {
        return $this->batchName;
    }

    public function __construct($name, $phoneNumber, $batchName) {
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->batchName = $batchName;
        $this->id = self::$idIncreament;
        self::$idIncreament = self::$idIncreament + 1;
    }

}
?>