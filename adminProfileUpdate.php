<?php
require "connection.php";

session_start();
if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin - Profile</title>

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php
            require "slider.php";
            ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <?php
                        require "navbar.php";
                        ?>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Update your admin profile</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">



                            <!-- Content Row -->

                            <!-- Content Column -->

                            <div class="col-12 col-lg-4 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Admin Profile Picture</h6>
                                    </div>
                                    <div class="card-body text-center">

                                        <!-- Pic Update -->
                                        <?php

                                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' ");
                                        $pn = $profileimg->num_rows;

                                        if ($pn == 1) {
                                            $p = $profileimg->fetch_assoc();
                                        ?>

                                            <img id="prev" class="rounded-circle mt-3" src="<?php echo $p["code"] ?>" width="150px">

                                        <?php
                                        } else {
                                        ?>

                                            <img id="prev" src="resources/demoProfileImg.jpg" width="150px" class="rounded mt-3">

                                        <?php
                                        }


                                        ?>
                                        <br>
                                        <span class="font-weight-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                        <br>
                                        <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>

                                        <br>
                                        <input class="d-none" type="file" id="profileimg" accept="img/*">
                                        <label onclick="changeImg();" class="btn btn-primary mt-3" for="profileimg">Update Profile Image</label>
                                        <!-- Pic Update -->

                                    </div>

                                </div>


                            </div>


                            <div class="col-12 col-lg-8 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Update your profile</h6>
                                    </div>
                                    <div class="card-body text-center">

                                        <?php

                                        $urs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION["u"]["email"] . "'");
                                        $un = $urs->num_rows;
                                        $ud = $urs->fetch_assoc();


                                        ?>

                                        <div class="mb-3 col-12  d-inline-block">
                                            <label for="fn" class="form-label align-start">First Name</label>
                                            <input id="fn" type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $ud["fname"]; ?>">
                                        </div>
                                        <div class="mb-3 col-12  d-inline-block">
                                            <label for="ln" class="form-label">Last Name</label>
                                            <input id="ln" type="text" class="form-control" value="<?php echo $ud["lname"]; ?>">
                                        </div>
                                        <div class="mb-3 col-12  d-inline-block">
                                            <label for="email" class="form-label text-left">Email address</label>
                                            <input id="email" type="email" class="form-control" aria-describedby="emailHelp" readonly value="<?php echo $ud["email"]; ?>">
                                        </div>
                                        <div class="mb-3 col-12  d-inline-block">
                                            <label for="pass" class="form-label">Password</label>
                                            <input id="pass" type="text" class="form-control" readonly value="<?php echo $ud["password"]; ?>">
                                        </div>
                                        <div class="mb-3 col-12  d-inline-block">
                                            <label for="nic" class="form-label">NIC</label>
                                            <input id="nic" type="text" class="form-control" value="<?php echo $ud["NIC"]; ?>">
                                        </div>


                                        <div class="my-4 px-3  d-block ">
                                            <a class="btn btn-primary col-12" onclick="updateprofile();">Register Teacher & Send Verification code</a>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="adminLogout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="js/sb-admin-2.min.js"></script>
            <script src="vendor/chart.js/Chart.min.js"></script>
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
            <script src="script.js"></script>

    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>