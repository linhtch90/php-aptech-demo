<?php

class Supplier {
    private $id;
    private $name;
    private $email;
    private $phoneNumber;
    private $address;

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
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function __construct($name, $email, $phoneNumber, $address) {
        $this->id = null;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
    }
}

?>