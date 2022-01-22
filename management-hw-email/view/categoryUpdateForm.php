<?php 
include "./subComponents/htmlHeadComponent.php"; 
include "../service/categoryService.php";

$category = getCategoryById($_GET["id"]);
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=categoryUpdate&id=<?php echo $_GET["id"] ?>" method="post">
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="name" value="<?php echo $category["Name"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="description" value="<?php echo $category["Description"] ?>">
                    </div>                    
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Update Category">
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