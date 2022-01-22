<?php

if (!isset($_COOKIE["Customer"])) {
    echo "<h1>Unauthorized. Please visit Homepage and Log In as a customer first!</h1>";
    exit;
}

?>

<?php

include "../service/orderService.php";
include "../service/productService.php";
include "../service/orderDetailService.php";

$order = getOrderById($_GET["id"]);
$products = getAllProducts();
$orderDetails = getAllOrderDetailByOrderId($_GET["id"]);

?>

<?php include "./subComponents/htmlHeadComponent.php"; ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">


            <?php
            if ($orderDetails !== null) {
                echo '<div class="row">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">ORDER ITEMS</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OrderId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ProductId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>                                        
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>';
            } ?>

            <!-- Begin View -->
            <?php
            if ($orderDetails !== null) {
                foreach ($orderDetails as $orderDetail) {
                    if ($orderDetail["Deleted"] == false) {
                        echo "
                                                <tr>
                                                <td>                                                
                                                {$orderDetail["Id"]}
                                                </td>
                                                <td>
                                                {$orderDetail["OrderId"]}
                                                </td>
                                                <td>
                                                {$orderDetail["ProductId"]}
                                                </td>
                                                <td>
                                                {$orderDetail["Quantity"]}
                                                </td>
                                                <td>
                                                <a href='./orderDetailUpdateView.php?id={$orderDetail["Id"]}&orderId={$order["Id"]}' >Update</a>
                                                </td>
                                                <td>
                                                <a href='../index.php?action=orderDetailDelete&id={$orderDetail["Id"]}&orderId={$order["Id"]}' >Delete</a>
                                                </td>
                                                </tr>
                                                ";
                    }
                }
            }
            ?>
            <!-- End View -->
            <?php
            if ($orderDetails !== null) {
                echo '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>';
            } ?>

            <form role="form" action="../index.php?action=orderDetailAdd" method="post">
                <div class="d-flex">
                    <div class="input-group input-group-outline mb-3 mx-1 is-filled focused is-focused">
                        <label class="form-label">OrderId</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="orderId" readonly="readonly" value="<?php echo $order["Id"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 mx-1 is-filled focused is-focused">
                        <label class="form-label">ProductId</label>
                        <select name="productId" class="form-control">
                            <?php
                            foreach ($products as $product) {
                                echo "<option value='{$product['Id']}'>{$product['Name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3 mx-1">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="quantity">
                    </div>
                </div>
                <div class="text-center w-25">
                    <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Add Order Item">
                </div>
            </form>

            <form role="form" action="../index.php?action=orderDetailSubmit" method="post">
                <div class="input-group input-group-outline mb-3 mx-1 is-filled focused is-focused">
                    <input type="hidden" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="orderId" readonly="readonly" value="<?php echo $order["Id"] ?>">
                </div>
                <div class="text-center w-25">
                    <input type="submit" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0" value="Submit Order">
                </div>
            </form>
            <?php include "./subComponents/footerComponent.php"; ?>
        </div>
    </main>
    <?php include "./subComponents/toogleSettingComponent.php"; ?>
    <!--   Core JS Files   -->
    <?php include "./subComponents/jsComponent.php"; ?>
</body>

</html>