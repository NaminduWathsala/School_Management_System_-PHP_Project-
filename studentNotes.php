<?php
require "connection.php";
session_start();
if (isset($_SESSION["s"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Notes</title>

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <form class="form-inline">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                        </form>

                        <!-- Topbar Search -->
                        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input id="searchtxt" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="searchTeacher();">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> -->

                        <!-- Topbar Navbar -->
                        <?php
                        require "navbar.php";
                        ?>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Lesson Notes</h1>
                        <p class="mb-4">You can find all your Lesson notes from here.</p>

                        <?php

                        $tg =  Database::search("SELECT * FROM `teacher` WHERE `teachers_grade_id` = '" . $_SESSION["s"]["grade_id"] . "'");
                        $tgn = $tg->num_rows;

                        // for ($i = 1; $i <= $tgn; $i++) {
                        //     $te = $tg->fetch_assoc();
                        //     echo "Hi";
                        // }

                        while ($tgf = $tg->fetch_assoc()) {


                        ?>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $tgf["full_name"] ?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Lesson Name</th>
                                                    <th>Teacher</th>
                                                    <th>Subject</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Lesson Name</th>
                                                    <th>Teacher</th>
                                                    <th>Subject</th>
                                                    <th>Download</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>


                                                <?php

                                                $rs1 =  Database::search("SELECT `teacher`.`id` AS `tid`,`notes`.`id` AS `nid`, `notes`.`name` AS `tname`, `code`, `notes`.`teacher_id` ,`full_name`,`teachers_subject`.`name` AS `sname` FROM `notes` INNER JOIN `teacher` ON `notes`.`teacher_id` = `teacher`.`id` INNER JOIN `teacher_has_subject` ON `teacher_has_subject`.`teacher_id` = `teacher`.`id` INNER JOIN `teachers_subject` ON `teacher_has_subject`.`teachers_subject_id` =`teachers_subject`.`id` WHERE `teacher`.`id` = '" . $tgf["id"] . "'");
                                                $n1 = $rs1->num_rows;

                                                while ($te = $rs1->fetch_assoc()) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $te["nid"] ?></td>
                                                        <td><?php echo $te["tname"] ?></td>
                                                        <td><?php echo $te["full_name"] ?></td>
                                                        <td><?php echo $te["sname"] ?></td>
                                                        <td><a href="<?php echo $te["code"] ?>" class="btn btn-info">Download</a></td>
                                                    </tr>


                                                <?php

                                                }
                                                ?>




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }


                        ?>





                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
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