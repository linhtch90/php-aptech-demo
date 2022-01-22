<?php include "./subComponents/htmlHeadComponent.php"; ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include "./subComponents/sidebarComponent.php"; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include "./subComponents/navbarComponent.php"; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <form role="form" action="../index.php?action=employeeAdd" method="post">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="firstName">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="lastName">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="phoneNumber">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="address">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="email">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="date" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="birthday">
                    </div>
                    <div class="text-center w-25">
                        <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Add New Employee">
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