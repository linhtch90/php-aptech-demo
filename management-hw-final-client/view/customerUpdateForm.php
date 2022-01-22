<?php 
include "./subComponents/htmlHeadComponent.php"; 
include "../service/customerService.php";

$customer = getCustomerById($_GET["id"]);
?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=customerUpdate&id=<?php echo $_GET["id"] ?>" method="post">
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="firstName" value="<?php echo $customer["FirstName"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="lastName" value="<?php echo $customer["LastName"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="phoneNumber" value="<?php echo $customer["PhoneNumber"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="address" value="<?php echo $customer["Address"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="email" value="<?php echo $customer["Email"] ?>">
                    </div>
                    <div class="input-group input-group-outline mb-3 is-filled focused is-focused">
                        <label class="form-label">Birthday</label>
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="birthday" value="<?php echo date('Y-m-d', strtotime($customer["Birthday"])) ?>">
                    </div>
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Update Customer">
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