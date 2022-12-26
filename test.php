<!DOCTYPE html>

<html>

<head>

    <title>MYphone|User Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="resources/logo.svg"> -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


</head>

<body>

    <?php

    require "connection.php";
    session_start();
    if (isset($_SESSION["u"])) {

        // require "header.php";
    ?>

        <div class="container-fluid rounded " style="background-color: #e9f5fb;">

            <div class="row">
                <div class="col-md-3 border-end">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <?php

                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' ");
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
                        <span class="font-weight-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                        <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>
                        <input class="d-none" type="file" id="profileimg" accept="img/*">
                        <label class="btn btn-primary mt-3" for="profileimg">Update Profile Image</label>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary" onclick="updateprofile123();">Update Profile</button>
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
<?php

    } ?>


</html>