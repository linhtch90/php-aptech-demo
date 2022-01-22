<?php

class OrderDetail {
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $deleted;

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }
    
    public function getOrderId() {
        return $this->orderId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }
    
    public function getProductId() {
        return $this->productId;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }

    public function setDeleted($deleted) {
        $this->deleted = $deleted;
    }
    
    public function getDeleted() {
        return $this->deleted;
    }

    public function __construct($orderId, $productId, $quantity) {
        $this->id = null;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->deleted = false;
    }
}

?>