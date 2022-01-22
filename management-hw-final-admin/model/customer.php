<?php

class Customer {
    private $id;
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $address;
    private $email;
    private $birthday;
    private $password;
    private $verificationCode;
    private $activated;

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    public function getLastName() {
        return $this->lastName;
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

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }
    
    public function getBirthday() {
        return $this->birthday;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function setVerificationCode($verificationCode) {
        $this->verificationCode = $verificationCode;
    }
   
    public function getVerificationCode() {
        return $this->verificationCode;
    }

    public function setActivated($activated) {
        $this->activated = $activated;
    }
    
    public function getActivated() {
        return $this->activated;
    }

    public function __construct($firstName, $lastName, $email, $phoneNumber, $address, $birthday) {
        $this->id = uniqid();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->birthday = $birthday;
    }
}

?>
