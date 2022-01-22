<?php 
include "./subComponents/htmlHeadComponent.php"; 
include "../service/orderService.php";
include "../service/customerService.php";
include "../service/employeeService.php";

$customers = getAllCustomers();
$employees = getAllEmployees();
$order = getOrderById($_GET["id"]);
$status = ["WAITING", "COMPLETED", "CANCELED"];
$paymentTypes = ["CREDIT CARD", "CASH"];
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=orderUpdate&id=<?php echo $_GET["id"] ?>" method="post">
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">CreatedDate</label>
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="createdDate" value="<?php echo date('Y-m-d', strtotime($order["CreatedDate"])) ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">ShippedDate</label>
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippedDate" value="<?php echo date('Y-m-d', strtotime($order["ShippedDate"])) ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Status</label>                        
                        <select name="status" class="form-control">
                            <?php 
                            foreach ($status as $item) {
                                if ($item == $order["Status"]) {
                                    echo "<option value='{$item}' selected>{$item}</option>";
                                } else {
                                    echo "<option value='{$item}'>{$item}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="description" value="<?php echo $order["Description"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">ShippingAddress</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippingAddress" value="<?php echo $order["ShippingAddress"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">ShippingCity</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippingCity" value="<?php echo $order["ShippingCity"] ?>">
                    </div> 
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">PaymentType</label>                        
                        <select name="paymentType" class="form-control">
                        <?php 
                            foreach ($paymentTypes as $item) {
                                if ($item == $order["PaymentType"]) {
                                    echo "<option value='{$item}' selected>{$item}</option>";
                                } else {
                                    echo "<option value='{$item}'>{$item}</option>";
                                }
                            }
                            ?>                           
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">CustomerId</label>
                        <select name="customerId" class="form-control">
                            <?php
                            foreach ($customers as $customer) {
                                if ($customer["Id"] == $order["CustomerId"]) {
                                    echo "<option value='{$customer['Id']}' selected>" . $customer['FirstName'] . " " . $customer['LastName'] . "</option>";
                                } else {
                                    echo "<option value='{$customer['Id']}'>" . $customer['FirstName'] . " " . $customer['LastName'] . "</option>";
                                }
                            }
                            ?>
                        </select>                        
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">EmployeeId</label>
                        <select name="employeeId" class="form-control">
                            <?php
                            foreach ($employees as $employee) {
                                if ($employee["Id"] == $order["EmployeeId"]) {
                                    echo "<option value='{$employee['Id']}' selected>" . $employee['FirstName'] . " " . $employee['LastName'] . "</option>";
                                } else {
                                    echo "<option value='{$employee['Id']}'>" . $employee['FirstName'] . " " . $employee['LastName'] . "</option>";
                                }
                            }
                            ?>
                        </select>                        
                    </div>                    
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Update Order">
                    </div>
                </form>
            </div>

            <?php include "./subComponents/footerComponent.php"; ?>
        </div>
    </main>
    <?php include "./subComponents/toogleSettingComponent.php"; ?>
    <!--   Core JS Files   -->
    <?php include "./subComponents/jsComponent.php"; ?>
</body>

</html>