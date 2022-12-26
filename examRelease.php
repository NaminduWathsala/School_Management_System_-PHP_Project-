<?php
require "connection.php";
session_start();
if (isset($_SESSION["ao"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Answer & Results</title>

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
                        <h1 class="h3 mb-2 text-gray-800">Answer & Results</h1>
                        <p class="mb-4">You can find all your Exams & Assignments from here. And you can add Marks from here.</p>

                        <?php

                        $tg =  Database::search("SELECT * FROM `teacher`");
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
                                                    <th>Exam Id</th>
                                                    <th>Student Id</th>
                                                    <th>Student Name</th>
                                                    <th>Grade</th>
                                                    <th>Exam or Assignment Name</th>
                                                    <th>Marks</th>
                                                    <th>Upload Marks</th>


                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Exam Id</th>
                                                    <th>Student Id</th>
                                                    <th>Student Name</th>
                                                    <th>Grade</th>
                                                    <th>Exam or Assignment Name</th>
                                                    <th>Marks</th>
                                                    <th>Upload Marks</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>


                                                <?php

                                                $rs1 =  Database::search("SELECT
                                                `Student`.`id` AS `sid`,
                                                `Student`.`full_name` AS `sname`,
                                                `students_grade`.`grade`,
                                                `exam`.`name`,
                                                `answers`.`code`,
                                                `answers`.`id` AS `aid`,
                                                `teacher`.`full_name` AS `tname`,
                                                `exam_results`.`marks`,
                                                `exam_results`.`status_id`,
                                                `exam_results`.`id` AS `eid`
                                            FROM
                                                `answers`
                                            INNER JOIN `Student` ON `answers`.`student_id` = `Student`.`id`
                                            INNER JOIN `exam` ON `exam`.`id` = `answers`.`exam_id`
                                            INNER JOIN `students_grade` ON `students_grade`.`id` = `Student`.`grade_id`
                                            INNER JOIN  `teacher` ON `teacher`.`id` =`exam`.`teacher_id`
                                            INNER JOIN  `exam_results` ON `exam_results`.`answer_id` =`answers`.`id`
                                            WHERE
                                               `teacher`.`id` = '" . $tgf["id"] . "' AND `exam_results`.`marks` >= '0'");
                                                $n1 = $rs1->num_rows;


                                                while ($te = $rs1->fetch_assoc()) {
                                                    $eid = $te["eid"]
                                                ?>
                                                    <tr>
                                                        <td><?php echo $te["aid"] ?> </td>
                                                        <td><?php echo $te["sid"] ?> </td>
                                                        <td><?php echo $te["sname"] ?></td>
                                                        <td><?php echo $te["grade"] ?></td>
                                                        <td><?php echo $te["name"] ?></td>
                                                        <td><?php echo $te["marks"] ?></td>
                                                        <td>

                                                            <?php
                                                            $s = $te["status_id"];

                                                            if ($s == "1") {
                                                            ?>
                                                                <button id="blockbtn<?php echo  $te["eid"]; ?>" class="btn btn-success d-grid" onclick="uploadMarks('<?php echo  $te['eid']; ?>');">Done</button>

                                                            <?php

                                                            } else {
                                                            ?>
                                                                <button id="blockbtn<?php echo  $te["eid"]; ?>" class="btn btn-warning d-grid" onclick="uploadMarks('<?php echo  $te['eid']; ?>');">Upload</button>

                                                            <?php
                                                            }
                                                            ?>


                                                        </td>
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


        <!-- Model -->
        <div class="modal fade" id="studentExamModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exams & Assignments Upload</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Upload youe Exam or Assignment Paper here</label>

                        <input class="d-none" type="file" id="myfile">
                        <label class="btn btn-primary mt-3 d-grid" for="myfile">Add Paper</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-success" onclick="studentExamUpload();">Upload Answer Paper</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model -->

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <script src="bootstrap.min.js"></script>
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