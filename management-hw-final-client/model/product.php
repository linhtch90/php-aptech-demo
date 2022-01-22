<?php

class Product {
    private $id;
    private $name;
    private $price;
    private $discount;
    private $stock;
    private $categoryId;
    private $supplierId;
    private $description;
    private $imagePath;
    
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

    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }
    
    public function getDiscount() {
        return $this->discount;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }
    
    public function getStock() {
        return $this->stock;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }
    
    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setSupplierId($supplierId) {
        $this->supplierId = $supplierId;
    }
    
    public function getSupplierId() {
        return $this->supplierId;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }
    
    public function getImagePath() {
        return $this->imagePath;
    }

    public function __construct($name, $price, $discount, $stock, $categoryId, $supplierId, $description, $imagePath) {
        $this->id = null;
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
        $this->stock = $stock;
        $this->categoryId = $categoryId;
        $this->supplierId = $supplierId;
        $this->description = $description;
        $this->imagePath = $imagePath;
    }
    
}

?>
