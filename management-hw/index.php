<?php

include "./model/supplier.php";
include "./model/employee.php";
include "./model/customer.php";
include "./model/category.php";
include "./model/product.php";
include "./model/order.php";
include "./model/orderDetail.php";

include "./service/supplierService.php";
include "./service/employeeService.php";
include "./service/customerService.php";
include "./service/categoryService.php";
include "./service/productService.php";
include "./service/orderService.php";
include "./service/orderDetailService.php";

if (!isset($_GET["action"])) {

    // supplier

    header("Location: ./view/supplierView.php");
} else if ($_GET["action"] == "addSupplierForm") {
    header("Location: ./view/addSupplierForm.php");
} else if ($_GET["action"] == "addSupplier") {
    $supplier = new Supplier($_POST["name"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"]);
    insertSupplier($supplier);
    header("Location: ./view/supplierView.php");
} else if ($_GET["action"] == "deleteSupplier") {
    $result = deleteSupplier((int)$_GET["id"]);
    header("Location: ./view/supplierView.php");
} else if ($_GET["action"] == "updateSupplierForm") {
    header("Location: ./view/updateSupplierForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "updateSupplier") {
    $supplier = new Supplier($_POST["name"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"]);
    updateSupplier($supplier, $_GET["id"]);
    header("Location: ./view/supplierView.php");
} else if ($_GET["action"] == "employeeView") {

    // employee

    header("Location: ./view/employeeView.php");
} else if ($_GET["action"] == "employeeAddForm") {
    header("Location: ./view/employeeAddForm.php");
} else if ($_GET["action"] == "employeeAdd") {
    $rawdate = htmlentities($_POST["birthday"]);
    $birthday = date("Y-m-d", strtotime($rawdate));
    $employee = new Employee($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"], $birthday);
    insertEmployee($employee);
    header("Location: ./view/employeeView.php");
} else if ($_GET["action"] == "employeeDelete") {
    deleteEmployee($_GET["id"]);
    header("Location: ./view/employeeView.php");
} else if ($_GET["action"] == "employeeUpdateForm") {
    header("Location: ./view/employeeUpdateForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "employeeUpdate") {
    $rawdate = htmlentities($_POST["birthday"]);
    $birthday = date("Y-m-d", strtotime($rawdate));
    $employee = new Employee($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"], $birthday);
    updateEmployee($employee, $_GET["id"]);
    header("Location: ./view/employeeView.php");
} else if ($_GET["action"] == "customerView") {

    // customer

    header("Location: ./view/customerView.php");
} else if ($_GET["action"] == "customerAddForm") {
    header("Location: ./view/customerAddForm.php");
} else if ($_GET["action"] == "customerAdd") {
    $rawdate = htmlentities($_POST["birthday"]);
    $birthday = date("Y-m-d", strtotime($rawdate));
    $customer = new Customer($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"], $birthday);
    insertCustomer($customer);
    header("Location: ./view/customerView.php");
} else if ($_GET["action"] == "customerDelete") {
    deleteCustomer($_GET["id"]);
    header("Location: ./view/customerView.php");
} else if ($_GET["action"] == "customerUpdateForm") {
    header("Location: ./view/customerUpdateForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "customerUpdate") {
    $rawdate = htmlentities($_POST["birthday"]);
    $birthday = date("Y-m-d", strtotime($rawdate));
    $customer = new Customer($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"], $birthday);
    updateCustomer($customer, $_GET["id"]);
    header("Location: ./view/customerView.php");
} else if ($_GET["action"] == "categoryView") {

    // category

    header("Location: ./view/categoryView.php");
} else if ($_GET["action"] == "categoryAddForm") {
    header("Location: ./view/categoryAddForm.php");
} else if ($_GET["action"] == "categoryAdd") {    
    $category = new Category($_POST["name"], $_POST["description"]);
    insertCategory($category);
    header("Location: ./view/categoryView.php");
} else if ($_GET["action"] == "categoryDelete") {
    deleteCategory($_GET["id"]);
    header("Location: ./view/categoryView.php");
} else if ($_GET["action"] == "categoryUpdateForm") {
    header("Location: ./view/categoryUpdateForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "categoryUpdate") {
    $category = new Category($_POST["name"], $_POST["description"]);
    updateCategory($category, $_GET["id"]);
    header("Location: ./view/categoryView.php");
} else if ($_GET["action"] == "productView") {

    // product

    header("Location: ./view/productView.php");
} else if ($_GET["action"] == "productAddForm") {
    header("Location: ./view/productAddForm.php");
} else if ($_GET["action"] == "productAdd") {    
    $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"]);
    insertProduct($product);
    header("Location: ./view/productView.php");
} else if ($_GET["action"] == "productDelete") {
    deleteProduct($_GET["id"]);
    header("Location: ./view/productView.php");
} else if ($_GET["action"] == "productUpdateForm") {
    header("Location: ./view/productUpdateForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "productUpdate") {
    $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"]);
    updateProduct($product, $_GET["id"]);
    header("Location: ./view/productView.php");
} else if ($_GET["action"] == "orderView") {

    // order

    header("Location: ./view/orderView.php");
} else if ($_GET["action"] == "orderAddForm") {
    header("Location: ./view/orderAddForm.php");
} else if ($_GET["action"] == "orderAdd") {
    $rawdate = htmlentities($_POST["createdDate"]);
    $createdDate = date("Y-m-d", strtotime($rawdate));
    $rawdate = htmlentities($_POST["shippedDate"]);
    $shippedDate = date("Y-m-d", strtotime($rawdate));    
    $order = new Order($createdDate, $shippedDate, $_POST["status"], $_POST["description"], $_POST["shippingAddress"], $_POST["shippingCity"], $_POST["paymentType"], $_POST["customerId"], $_POST["employeeId"]);
    insertOrder($order);
    header("Location: ./view/orderView.php");
} else if ($_GET["action"] == "orderDelete") {
    deleteOrder($_GET["id"]);
    header("Location: ./view/orderView.php");
} else if ($_GET["action"] == "orderUpdateForm") {
    header("Location: ./view/orderUpdateForm.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "orderUpdate") {
    $rawdate = htmlentities($_POST["createdDate"]);
    $createdDate = date("Y-m-d", strtotime($rawdate));
    $rawdate = htmlentities($_POST["shippedDate"]);
    $shippedDate = date("Y-m-d", strtotime($rawdate));    
    $order = new Order($createdDate, $shippedDate, $_POST["status"], $_POST["description"], $_POST["shippingAddress"], $_POST["shippingCity"], $_POST["paymentType"], $_POST["customerId"], $_POST["employeeId"]);
    updateOrder($order, $_GET["id"]);
    header("Location: ./view/orderView.php");
} else if ($_GET["action"] == "orderDetailView") {

    // orderDetail

    header("Location: ./view/orderDetailView.php?id={$_GET["id"]}");
} else if ($_GET["action"] == "orderDetailAdd") {        
    $orderDetail = new OrderDetail($_POST["orderId"], $_POST["productId"], $_POST["quantity"]);
    insertOrderDetail($orderDetail);
    header("Location: ./view/orderDetailView.php?id={$_POST["orderId"]}");
} else if ($_GET["action"] == "orderDetailDelete") {
    deleteOrderDetail($_GET["id"]);
    header("Location: ./view/orderDetailView.php?id={$_GET["orderId"]}");
} else if ($_GET["action"] == "orderDetailUpdate") {    
    $orderDetail = new OrderDetail($_POST["orderId"], $_POST["productId"], $_POST["quantity"]);
    updateOrderDetail($orderDetail, $_GET["id"]);
    header("Location: ./view/orderDetailView.php?id={$_GET["orderId"]}");
}
