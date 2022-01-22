<?php

class Order {
    private $id;
    private $createdDate;
    private $shippedDate;
    private $status;
    private $description;
    private $shippingAddress;
    private $shippingCity;
    private $paymentType;
    private $customerId;
    private $employeeId;
    private $deleted;

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }
    
    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function setShippedDate($shippedDate) {
        $this->shippedDate = $shippedDate;
    }
    
    public function getShippedDate() {
        return $this->shippedDate;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setShippingAddress($shippingAddress) {
        $this->shippingAddress = $shippingAddress;
    }
    
    public function getShippingAddress() {
        return $this->shippingAddress;
    }

    public function setShippingCity($shippingCity) {
        $this->shippingCity = $shippingCity;
    }
    
    public function getShippingCity() {
        return $this->shippingCity;
    }

    public function setPaymentType($paymentType) {
        $this->paymentType = $paymentType;
    }
    
    public function getPaymentType() {
        return $this->paymentType;
    }

    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }
    
    public function getCustomerId() {
        return $this->customerId;
    }

    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }
    
    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function setDeleted($deleted) {
        $this->deleted = $deleted;
    }
    
    public function getDeleted() {
        return $this->deleted;
    }

    public function __construct($createdDate, $shippedDate, $status, $description, $shippingAddress, $shippingCity, $paymentType, $customerId, $employeeId) {
        $this->id = null;
        $this->createdDate = $createdDate;
        $this->shippedDate = $shippedDate;
        $this->status = $status;
        $this->description = $description;
        $this->shippingAddress = $shippingAddress;
        $this->shippingCity = $shippingCity;
        $this->paymentType = $paymentType;
        $this->customerId = $customerId;
        $this->employeeId = $employeeId;
        $this->deleted = false;        
    }
}

?>