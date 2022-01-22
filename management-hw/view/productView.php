<?php

include "../service/productService.php";
$products = getAllProducts();

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
                            <h6 class="text-white text-capitalize ps-3">PRODUCTS TABLE</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>                                        
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CategoryId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SupplierId</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                        <th class="text-begin text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Begin View -->
                                    <?php
                                    if ($products != null) {
                                        foreach ($products as $product) {                                            
                                            echo ("
                                            <tr>
                                            <td>
                                            {$product["Id"]}
                                            </td>
                                            <td>
                                            {$product["Name"]}
                                            </td>
                                            <td>
                                            {$product["Price"]}
                                            </td>
                                            <td>
                                            {$product["Discount"]}
                                            </td>
                                            <td>
                                            {$product["Stock"]}
                                            </td>
                                            <td>
                                            {$product["CategoryId"]}
                                            </td>
                                            <td>
                                            {$product["SupplierId"]}
                                            </td>
                                            <td>
                                            {$product["Description"]}
                                            </td>                                            
                                            <td>
                                            <a href='../index.php?action=productUpdateForm&id={$product["Id"]}' >Update</a>
                                            </td>
                                            <td>
                                            <a href='../index.php?action=productDelete&id={$product["Id"]}' >Delete</a>
                                            </td>
                                            </tr>
                                            ");
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
            <a class="btn bg-gradient-primary mt-4 w-25" href="../index.php?action=productAddForm" type="button">Add New Product</a>
            <?php include "./subComponents/footerComponent.php"; ?>
        </div>
    </main>
    <?php include "./subComponents/toogleSettingComponent.php"; ?>
    <!--   Core JS Files   -->
    <?php include "./subComponents/jsComponent.php"; ?>
</body>

</html>