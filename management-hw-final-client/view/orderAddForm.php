<?php 
include "./subComponents/htmlHeadComponent.php"; 
include "../service/customerService.php";
include "../service/employeeService.php";

$customers = getAllCustomers();
$employees = getAllEmployees();
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=orderAdd" method="post">
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">CreatedDate</label>                        
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="createdDate">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">ShippedDate</label>
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippedDate">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Status</label>                        
                        <select name="status" class="form-control">
                            <option value="WAITING">WAITING</option>
                            <option value="COMPLETED">COMPLETED</option>
                            <option value="CANCELED">CANCELED</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="description">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">ShippingAddress</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippingAddress">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">ShippingCity</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="shippingCity">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">PaymentType</label>                        
                        <select name="paymentType" class="form-control">
                            <option value="CREDIT CARD">CREDIT CARD</option>
                            <option value="CASH">CASH</option>                            
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">CustomerId</label>
                        <select name="customerId" class="form-control">
                            <?php
                            foreach ($customers as $customer) {
                                echo "<option value='{$customer['Id']}'>" . $customer['FirstName'] . " " . $customer['LastName'] . "</option>";
                            }
                            ?>
                        </select>                        
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">EmployeeId</label>
                        <select name="employeeId" class="form-control">
                            <?php
                            foreach ($employees as $employee) {
                                echo "<option value='{$employee['Id']}'>" . $employee['FirstName'] . " " . $employee['LastName'] . "</option>";
                            }
                            ?>
                        </select>                        
                    </div>                                        
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Add New Order">
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