<?php

include "../service/orderService.php";
$orders = getAllOrders();

?>

<?php include "./subComponents/htmlHeadComponent.php"; ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">ORDERS TABLE</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CreatedDate</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ShippedDate</th>                                        
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>                                        
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CustomerId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EmployeeId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OrderDetails</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Begin View -->
                                    <?php
                                    if ($orders != null) {
                                        foreach ($orders as $order) {
                                            $createdDate = date('Y-m-d', strtotime($order["CreatedDate"]));
                                            $shippedDate = date('Y-m-d', strtotime($order["ShippedDate"]));
                                            if ($order["Deleted"] == false) {
                                                echo ("
                                                <tr>
                                                <td>                                                
                                                {$order["Id"]}
                                                </td>
                                                <td>
                                                {$createdDate}
                                                </td>
                                                <td>
                                                {$shippedDate}
                                                </td>
                                                <td>
                                                {$order["Status"]}
                                                </td>
                                                <td>
                                                {$order["CustomerId"]}
                                                </td>
                                                <td>
                                                {$order["EmployeeId"]}
                                                </td>
                                                <td>
                                                <a href='../index.php?action=orderDetailView&id={$order["Id"]}' >Details</a>
                                                </td>                                            
                                                <td>
                                                <a href='../index.php?action=orderUpdateForm&id={$order["Id"]}' >Update</a>
                                                </td>
                                                <td>
                                                <a href='../index.php?action=orderDelete&id={$order["Id"]}' >Delete</a>
                                                </td>
                                                </tr>
                                                ");
                                            }                                            
                                        }
                                    }
                                    ?>
                                    <!-- End View -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn bg-gradient-primary mt-4 w-25" href="../index.php?action=orderAddForm" type="button">Add New Order</a>
            <?php include "./subComponents/footerComponent.php"; ?>
        </div>
    </main>
    <?php include "./subComponents/toogleSettingComponent.php"; ?>
    <!--   Core JS Files   -->
    <?php include "./subComponents/jsComponent.php"; ?>
</body>

</html>