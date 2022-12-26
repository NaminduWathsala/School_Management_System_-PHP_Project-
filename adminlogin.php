<!DOCTYPE html>
<html>

<head>
    <title>MSC | Admin | Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="backgroundcolor">

    <div class="container-fluid vh-100 d-flex  justify-content-center">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">
                    <div class="col-12 ">
                        <img src="images/logo.png" class="logo" alt="">
                    </div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome To Maris Stella College Admins</p>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-2 pb-4 ps-5 pe-5">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background4" style="height: 330px;"></div>

                    <?php
                    $e = "";
                    $p = "";

                    if (isset($_COOKIE["e"])) {
                        $e = $_COOKIE["e"];
                    }

                    if (isset($_COOKIE["p"])) {
                        $p = $_COOKIE["p"];
                    }

                    ?>

                    <div class="col-12 col-lg-6 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title2">Sign In To Your Admin Account. </p>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-light">Email</label>
                                <input type="email" class="form-control" id="e" value="<?php echo $e; ?>">
                            </div>
                            <div class=" col-12">
                                <label class="form-label text-light">Password</label>
                                <input type="password" class="form-control" id="p" value="<?php echo $p; ?>">
                            </div>
                            <div class=" col-12">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label text-white ps-2" for="remember">Remember Me</label>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" id="adminemail" data-bs-target="#exampleModal" onclick="adminsignIn();">Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button id="adminpassword" class="btn btn-danger">Frogot Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center text-light">&copy; 2022 marisstellacollege.lk All Rights Reserved</p>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>

</body>

</html>