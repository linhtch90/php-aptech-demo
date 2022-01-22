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


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Please sign in with administration account first!';
    exit;
} else {
    $admin = new User($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

    $foundAdmin = getUserByEmail($_SERVER['PHP_AUTH_USER']);

    if ($foundAdmin != null) {
        $result = validateUser($admin);
        if ($result == true) {

            // admin accounted is validated successfully

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
                // save image path to database and image data to server
                $imageDir = "product-images";
                if (isset($_FILES["imagePath"]) && !empty($_FILES["imagePath"]["name"])) {
                    if ($_FILES["imagePath"]["tmp_name"] != null) {
                        $fileExtension = pathinfo($_FILES["imagePath"]["name"], PATHINFO_EXTENSION);
                        $filename = sha1_file($_FILES["imagePath"]["tmp_name"]) . "." . $fileExtension;
                        if (is_dir($imageDir)) {
                            $path = $imageDir . "/" . $filename;
                            if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $path)) {
                                // add product to database and dispatch next routing
                                $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"], $path);
                                insertProduct($product);
                                header("Location: ./view/productView.php");
                            }
                        }
                    }
                } else {
                    // add product to database and dispatch next routing (case unavailable-image)
                    $path = "product-images/unavailable-image.png";
                    $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"], $path);
                    insertProduct($product);
                    header("Location: ./view/productView.php");
                }
            } else if ($_GET["action"] == "productDelete") {
                deleteProduct($_GET["id"]);
                header("Location: ./view/productView.php");
            } else if ($_GET["action"] == "productUpdateForm") {
                header("Location: ./view/productUpdateForm.php?id={$_GET["id"]}");
            } else if ($_GET["action"] == "productUpdate") {
                $imageDir = "product-images";
                if (isset($_FILES["imagePath"]) && !empty($_FILES["imagePath"]["name"])) {
                    if ($_FILES["imagePath"]["tmp_name"] != null) {
                        $fileExtension = pathinfo($_FILES["imagePath"]["name"], PATHINFO_EXTENSION);
                        $filename = sha1_file($_FILES["imagePath"]["tmp_name"]) . "." . $fileExtension;
                        if (is_dir($imageDir)) {
                            $path = $imageDir . "/" . $filename;
                            if (move_uploaded_file($_FILES["imagePath"]["tmp_name"], $path)) {
                                // add product to database and dispatch next routing
                                $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"], $path);
                                updateProduct($product, $_GET["id"]);
                                header("Location: ./view/productView.php");
                            }
                        }
                    }
                } else {
                    // add product to database and dispatch next routing (case unavailable-image)
                    $path = null; // no longer important, service function does not need it
                    $product = new Product($_POST["name"], $_POST["price"], $_POST["discount"], $_POST["stock"], $_POST["categoryId"], $_POST["supplierId"], $_POST["description"], $path);
                    updateProductWithoutImage($product, $_GET["id"]);
                    header("Location: ./view/productView.php");
                }
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
            
        } else {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Please sign in with administration account first!';
            exit;
        }
    } else {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Please sign in with administration account first!';
        exit;
    }
}
