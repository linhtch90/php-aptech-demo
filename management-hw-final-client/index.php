<?php

include "./model/supplier.php";
include "./model/employee.php";
include "./model/customer.php";
include "./model/category.php";
include "./model/product.php";
include "./model/order.php";
include "./model/orderDetail.php";
include "./model/user.php";

include "./service/supplierService.php";
include "./service/employeeService.php";
include "./service/customerService.php";
include "./service/categoryService.php";
include "./service/productService.php";
include "./service/orderService.php";
include "./service/orderDetailService.php";
include "./service/userService.php";

if (!isset($_GET["action"])) {    
    if (!isset($_COOKIE["Customer"])) {
        header("Location: ./view/customerLogin.php");
    } else {
        header("Location: ./index.php?action=orderDetailView");
    }
} else if ($_GET["action"] == "orderDetailView") {

    // orderDetail

    if (!isset($_COOKIE["Customer"])) {
        header("Location: ./view/customerLogin.php");
    } else {
        $customer = getCustomerByEmail($_COOKIE["Customer"]);
        $createdDate = date("Y-m-d");
        $shippedDate = date("Y-m-d", strtotime(date("Y-m-d") . " +2 day"));    
        $order = new Order($createdDate, $shippedDate, "WAITING", "Custom", "USA", "Denver", "CREDIT CARD", $customer["Id"], "61dd4923efdc3");
        insertOrderTemp($order);
        $lastestId = getLastestOrderId();
        header("Location: ./view/orderDetailView.php?id={$lastestId}");
    }
} else if ($_GET["action"] == "orderDetailAdd") {       
    $orderDetail = new OrderDetail($_POST["orderId"], $_POST["productId"], $_POST["quantity"]);
    insertOrderDetail($orderDetail);
    header("Location: ./view/orderDetailView.php?id={$_POST["orderId"]}");
} else if ($_GET["action"] == "orderDetailSubmit") {
    $order = getOrderById($_POST["orderId"]);
    if ($order["Deleted"] = 1) {
        resetOrder($_POST["orderId"]);
    }
    header("Location: ./index.php?action=orderDetailView");
} else if ($_GET["action"] == "orderDetailDelete") {
    deleteOrderDetail($_GET["id"]);
    header("Location: ./view/orderDetailView.php?id={$_GET["orderId"]}");
} else if ($_GET["action"] == "orderDetailUpdate") {    
    $orderDetail = new OrderDetail($_POST["orderId"], $_POST["productId"], $_POST["quantity"]);
    updateOrderDetail($orderDetail, $_GET["id"]);
    header("Location: ./view/orderDetailView.php?id={$_GET["orderId"]}");
} else if ($_GET["action"] == "customerRegisterView") {
  
    // customer register

    header("Location: ./view/customerRegister.php");    
} else if ($_GET["action"] == "customerRegister") {
    $rawdate = htmlentities($_POST["birthday"]);
    $birthday = date("Y-m-d", strtotime($rawdate));
    $customer = new Customer($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["address"], $birthday, $_POST["password"]);
    $result = insertCustomer($customer);
    if ($result > 0) {
        sendEmail($customer);
    }
    header("Location: ./view/customerVerification.php?email={$_POST["email"]}");
} else if ($_GET["action"] == "customerVerification") {
    $customer = getCustomerByEmail($_GET["email"]);
    if ($_POST["verificationCode"] == $customer["VerificationCode"]) {
        updateCustomerActivated($_GET["email"]);
        header("Location: ./view/customerLogin.php");
    } else {
        header("Location: ./view/customerVerification.php?email={$_GET["email"]}");
    }    
} else if ($_GET["action"] == "customerCheckLogin") {
    $customer = getCustomerByEmail($_POST["email"]);
    if ($customer["Activated"] == "0") {
        header("Location: ./view/customerVerification.php?email={$_POST["email"]}");
    } else {
        $result = validateCustomer($_POST["email"], $_POST["password"]);
        if ($result == true) {
            setcookie("Customer", $_POST["email"], time() + 3600, "/");
            // header("Location: ./view/customerLoginResult.php?result=success");
            header("Location: ./index.php?action=orderDetailView");
        } else {
            // header("Location: ./view/customerLoginResult.php?result=failed");
            header("Location: ./view/customerLogin.php");
        }
    }
} else if ($_GET["action"] == "customerLogin") {
    if (!isset($_COOKIE["Customer"])) {
        header("Location: ./view/customerLogin.php");
    } else {
        header("Location: ./index.php?action=orderDetailView");
    }
} else if ($_GET["action"] == "customerLogout") {
    if (isset($_COOKIE["Customer"])) {
        unset($_COOKIE["Customer"]);
        setcookie("Customer", null, -1, "/");
    }
    header("Location: ./view/customerLogin.php");
}
