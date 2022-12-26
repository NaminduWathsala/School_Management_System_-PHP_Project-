<?php

require "connection.php";
session_start();
if (isset($_SESSION["s"])) {

?>
    <!DOCTYPE html>

    <html>

    <head>

        <title>MSC | Student Profile</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                            <h1 class="h3 mb-0 text-gray-800">Update your Student profile </h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">



                            <!-- Content Row -->

                            <!-- Content Column -->

                            <div class="col-12 col-lg-4 mb-4">


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Student Profile Picture</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <?php

                                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["s"]["email"] . "' ");
                                        $pn = $profileimg->num_rows;

                                        if ($pn == 1) {
                                            $p = $profileimg->fetch_assoc();
                                        ?>

                                            <img class="rounded-circle mt-5" src="<?php echo $p["code"] ?>" width="150px">

                                        <?php
                                        } else {
                                        ?>

                                            <img src="resources/demoProfileImg.jpg" width="150px" class="rounded mt-5">

                                        <?php
                                        }


                                        ?>
                                        <br>
                                        <span class="font-weight-bold"><?php echo $_SESSION["s"]["fname"] . " " . $_SESSION["s"]["lname"]; ?></span>
                                        <br>
                                        <span class="text-black-50"><?php echo $_SESSION["s"]["email"]; ?></span>
                                        <br>
                                        <input class="d-none" type="file" id="profileimg" accept="img/*">
                                        <label class="btn btn-primary mt-3" for="profileimg">Update Profile Image</label>

                                    </div>

                                </div>

                                <!-- Parent details -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Student Parent Details</h6>
                                    </div>
                                    <div class="card-body text-center">

                                        <?php



                                        $username = $_SESSION["s"]["email"];
                                        $saddressrs = Database::search("SELECT * FROM `Student` WHERE `parent_id` = '1' AND `email`= '" . $_SESSION["s"]["email"] . "' ");
                                        $n = $saddressrs->num_rows;

                                        if ($n == 0) {
                                            $stuper = Database::search("SELECT * FROM `parent` INNER JOIN `Student` ON `Student`.`parent_id` = `parent`.`id`  WHERE  `Student`.`id` = '" . $_SESSION["s"]["id"] . "'");
                                            $sp = $stuper->fetch_assoc();

                                        ?>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">First Name</label>
                                                <input id="pfn" type="text" class="form-control" placeholder="Enter your parent First Name" value="<?php echo  $sp["fname"] ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input id="pln" type="text" class="form-control" placeholder="Enter your parent Last Name" value="<?php echo  $sp["lname"] ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Email</label>
                                                <input id="pemail" type="text" class="form-control" placeholder="Enter your parent Email" value="<?php echo  $sp["email"] ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Date of Birthday</label>
                                                <input id="pbod" type="date" class="form-control" placeholder="Enter your parent Birthday" value="<?php echo  $sp["dob"] ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Mobile Number</label>
                                                <input id="pmn" type="text" class="form-control" placeholder="Enter your parent Mobile Number" value="<?php echo  $sp["phone"] ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Mobile Number(Landline)</label>
                                                <input id="pml" type="text" class="form-control" placeholder="Enter your parent Mobile Number(Landline)" value="<?php echo  $sp["mobile"] ?>" />
                                            </div>


                                            <div class="row ">

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <?php

                                                    $gender_id = $sp["gender_id"];
                                                    $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $gender_id . "' ");
                                                    $g = $ugender->fetch_assoc();

                                                    ?>

                                                    <input id="pgen" type="text" class="form-control" placeholder="Gender" value="<?php echo $g["name"] ?>" readonly />
                                                </div>
                                            </div>
                                        <?php

                                        } else {

                                        ?>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">First Name</label>
                                                <input id="pfn" type="text" class="form-control" placeholder="Enter your parent First Name" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input id="pln" type="text" class="form-control" placeholder="Enter your parent Last Name" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Email</label>
                                                <input id="pemail" type="text" class="form-control" placeholder="Enter your parent Email" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Date of Birthday</label>
                                                <input id="pbod" type="date" class="form-control" placeholder="Enter your parent Birthday" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Mobile Number</label>
                                                <input id="pmn" type="text" class="form-control" placeholder="Enter your parent Mobile Number" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Mobile Number(Landline)</label>
                                                <input id="pml" type="text" class="form-control" placeholder="Enter your parent Mobile Number(Landline)" value="" />
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Gender</label>

                                                <select class="form-select" id="pgen">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    $gen1 = Database::search("SELECT * FROM `gender`;");
                                                    $gen1num = $gen1->num_rows;
                                                    for ($x = 0; $x < $gen1num; $x++) {
                                                        $gen1fetch = $gen1->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $gen1fetch["id"]; ?>"><?php echo $gen1fetch["name"]; ?></option>


                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>


                                    <!-- </div> -->

                                </div>

                                <!-- Parent details -->

                            </div>

                            <div class="col-12 col-lg-8 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Update your profile</h6>
                                    </div>
                                    <div class="card-body text-center">


                                        <?php

                                        $urs = Database::search("SELECT * FROM `Student` WHERE `email` = '" . $_SESSION["s"]["email"] . "'");
                                        $un = $urs->num_rows;
                                        $teacher = $urs->fetch_assoc();


                                        ?>


                                        <div class="row mt-2">

                                            <div class="col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input id="fname" class="form-control" type="text" placeholder="first name" value="<?php echo $teacher["fname"]; ?>" />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input id="lname" class="form-control" type="text" placeholder="last name" value="<?php echo $teacher["lname"]; ?>" />
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input id="fullname" class="form-control" type="text" placeholder="Enter Phone Number" value="<?php echo $teacher["full_name"]; ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Mobile Number</label>
                                                <input id="phone" class="form-control" type="text" placeholder="Enter Phone Number" value="<?php echo $teacher["phone"]; ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Mobile Number(Landline)</label>
                                                <input id="mobile" class="form-control" type="text" placeholder="Enter Phone Number" value="<?php echo $teacher["mobile"]; ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Date of Birthday</label>
                                                <input id="dob" class="form-control" type="date" placeholder="Enter your Birthday" value="<?php echo $teacher["dob"]; ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Join Date</label>
                                                <input id="joindate" class="form-control" type="date" readonly value="<?php echo $teacher["date_of_join"]; ?>" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Gender</label>
                                                <?php

                                                $gender_id = $teacher["gender_id"];
                                                $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $gender_id . "' ");
                                                $g = $ugender->fetch_assoc();

                                                ?>

                                                <input type="text" class="form-control" placeholder="Gender" value="<?php echo $g["name"] ?>" readonly />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Grade</label>
                                                <?php

                                                $grade_id = $teacher["grade_id"];
                                                $ugrade_id = Database::search("SELECT * FROM `students_grade` WHERE `id`='" . $grade_id . "' ");
                                                $gr = $ugrade_id->fetch_assoc();

                                                ?>

                                                <input type="text" class="form-control" placeholder="Gender" value="<?php echo $gr["grade"] ?>" readonly />
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input id="email" class="form-control" type="text" placeholder="Enter Email Id" readonly value="<?php echo $_SESSION["s"]["email"]; ?>" />
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Password</label>
                                                <input id="password" class="form-control" type="text" placeholder="Enter Password" readonly value="<?php echo $_SESSION["s"]["password"]; ?>" />
                                            </div>

                                            <?php



                                            $username = $_SESSION["s"]["email"];
                                            $saddressrs = Database::search("SELECT * FROM `Student` WHERE `address_id` = '1' AND `email`= '" . $_SESSION["s"]["email"] . "' ");
                                            $n = $saddressrs->num_rows;

                                            if ($n == 0) {
                                                $tadds = Database::search("SELECT * FROM `Student` INNER JOIN `address` ON `Student`.`address_id` = `address`.`id` WHERE `Student`.`id` = '" . $_SESSION["s"]["id"] . "'");
                                                $d = $tadds->fetch_assoc();

                                            ?>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Address Line 1</label>
                                                    <input id="line1" class="form-control" type="text" placeholder="Enter Address Line 1" value="<?php echo  $d["line1"] ?>" />
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input id="line2" class="form-control" type="text" placeholder="Enter Address Line 2" value="<?php echo $d["line2"] ?>" />
                                                </div>

                                        </div>
                                        <div class="row mb-3">

                                            <?php

                                                $cityid = $d["city_id"];
                                                $ucity = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityid . "' ");
                                                $c = $ucity->fetch_assoc();

                                                $provinceid = $d["provinces_id"];
                                                $uprovince = Database::search("SELECT * FROM `provinces` WHERE `id` = '" . $provinceid . "' ");
                                                $l = $uprovince->fetch_assoc();

                                            ?>

                                            <div class="col-md-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-select " id="province">
                                                    <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>
                                                    <?php
                                                    $provincers = Database::search("SELECT * FROM `provinces` WHERE `id` !='" . $l["id"] . "' ");
                                                    $pn = $provincers->num_rows;
                                                    for ($i = 0; $i < $pn; $i++) {
                                                        $pr = $provincers->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <select class="form-select " id="city">
                                                    <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                                                    <?php
                                                    $citys = Database::search("SELECT * FROM `city` WHERE `id` !='" . $c["id"] . "' ");
                                                    $cn = $citys->num_rows;
                                                    for ($r = 0; $r < $cn; $r++) {
                                                        $cr = $citys->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $cr["id"]; ?>"><?php echo $cr["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>





                                        <?php
                                            } else {

                                        ?>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 01</label>
                                                <input id="line1" type="text" class="form-control" placeholder="Enter address line 01" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 02</label>
                                                <input id="line2" type="text" class="form-control" placeholder="Enter address line 02" value="" />
                                            </div>
                                            <div class="row ">

                                                <div class="col-md-6">
                                                    <label class="form-label">Province</label>

                                                    <select class="form-select" id="province">
                                                        <?php
                                                        $newprovince = Database::search("SELECT * FROM `provinces`;");
                                                        $newprovincerows = $newprovince->num_rows;
                                                        for ($x = 0; $x < $newprovincerows; $x++) {
                                                            $newprovincedata = $newprovince->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $newprovincedata["id"]; ?>"><?php echo $newprovincedata["name"]; ?></option>


                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <label class="form-label">City</label>

                                                    <select class="form-select" id="city">
                                                        <?php
                                                        $newcity = Database::search("SELECT * FROM `city`;");
                                                        $newcityrows = $newcity->num_rows;
                                                        for ($x = 0; $x < $newcityrows; $x++) {
                                                            $newcitydata = $newcity->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $newcitydata["id"]; ?>"><?php echo $newcitydata["name"]; ?></option>


                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                </div>

                                            </div>
                                        <?php

                                            }
                                        ?>



                                        <div class="mt-5 text-center">
                                            <button class="btn btn-primary" onclick="updateStudentprofile();">Update Profile</button>
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