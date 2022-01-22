<?php 
include "./subComponents/htmlHeadComponent.php"; 
include "../service/productService.php";
include "../service/categoryService.php";
include "../service/supplierService.php";

$categories = getAllCategories();
$suppliers = getAllSuppliers();
$product = getProductById($_GET["id"]);
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=productUpdate&id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="name" value="<?php echo $product["Name"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="price" value="<?php echo $product["Price"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Discount</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="discount" value="<?php echo $product["Discount"] ?>">
                    </div> 
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Stock</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="stock" value="<?php echo $product["Stock"] ?>">
                    </div> 
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">CategoryId</label>
                        <select name="categoryId" class="form-control">
                            <?php
                            foreach ($categories as $category) {
                                echo "<option value='{$category['Id']}'>{$category['Name']}</option>";
                            }
                            ?>
                        </select>                        
                    </div> 
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">SupplierId</label>
                        <select name="supplierId" class="form-control">
                            <?php
                            foreach ($suppliers as $supplier) {
                                echo "<option value='{$supplier['Id']}'>{$supplier['Name']}</option>";
                            }
                            ?>
                        </select>
                    </div> 
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="description" value="<?php echo $product["Description"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="imagePath" accept="image/png, image/jpeg">
                    </div>                     
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Update Product">
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