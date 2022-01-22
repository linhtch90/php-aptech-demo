<?php

class User {
    private $id;
    private $email;
    private $password;
    private $verificationCode;
    private $activated;

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
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

    public function __construct($email, $password) {
        $this->id = null;
        $this->email = $email;
        $this->password = $password;
        $this->verificationCode = uniqid();
        $this->activated = 0;
    }
}

?>