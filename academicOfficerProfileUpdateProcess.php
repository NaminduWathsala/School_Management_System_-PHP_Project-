<?php
session_start();

require "connection.php";

if (isset($_SESSION["ao"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $fullname = $_POST["fn"];
    $phone = $_POST["p"];
    $mobile = $_POST["m"];
    $dob = $_POST["dob"];
    $nic = $_POST["nic"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $province = $_POST["pro"];
    $quli = $_POST["quli"];



    if (isset($_FILES["i"])) {
        $image = $_FILES["i"];
    } else {
    }
    // validate

    if (empty($fname)) {
        echo "Please Enter Your First Name";
    } elseif (empty($lname)) {
        echo "Please Enter Your Last Name";
    } elseif (empty($fullname)) {
        echo "Please Enter Your Full Name";
    } elseif (empty($dob)) {
        echo "Please Enter Your Birthday";
    } else if (empty($phone)) {
        echo "Please Enter Your Mobile Number";
    } else if (strlen($phone) != 10) {
        echo "Please enter 10 digit mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $phone) == 0) {
        echo "Invalid mobile number";
    } else {

        Database::iud("UPDATE `teacher_qualifications` SET `name`='" . $quli . "' WHERE `id` = '" . $_SESSION["ao"]["teacher_qualifications_id"] . "'");

        Database::iud("INSERT INTO `address`( `line1`, `line2`, `city_id`, `provinces_id`) VALUES ('" . $line1 . "','" . $line2 . "','" . $city . "','" . $province . "')");

        $addressrs = Database::search("SELECT * FROM `address` WHERE `line1`='" . $line1 . "' AND `line2`='" . $line2 . "' AND `city_id`='" . $city . "' AND `provinces_id`='" . $province . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            $add = $addressrs->fetch_assoc();
            //update

            Database::iud("UPDATE `academic_officer` SET `fname`='" . $fname . "',`lname`='" . $lname . "',
            `full_name`='" . $fullname . "',`dob`='" . $dob . "',`phone`='" . $phone . "',
            `mobile`='" . $mobile . "',`address_id`='" . $add["id"] . "',
            `nic`='" . $nic . "' WHERE `email`='" . $_SESSION["ao"]["email"] . "' ");

            echo "Academic Officer profile updated || Academic Officer  Address updated ";
        } else {
            Database::iud("UPDATE `academic_officer` SET `fname`='" . $fname . "',`lname`='" . $lname . "',
            `full_name`='" . $fullname . "',`dob`='" . $dob . "',`phone`='" . $phone . "',
            `mobile`='" . $mobile . "',
            `nic`='" . $nic . "' WHERE `email`='" . $_SESSION["ao"]["email"] . "' ");

            echo "Academic Officer  profile updated";
        }

        $last_email = $_SESSION["ao"]["email"];

        // if (isset($_FILES["i"])) {
        $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
        $file_extention = $image["type"];

        if (!in_array($file_extention, $allowed_image_extention)) {
            echo " || Please Select a valid image.";
        } else {
            // echo $imageFile["name"];

            $newimgextention;
            if ($file_extention = "image/jpeg") {
                $newimgextention = ".jpeg";
            } elseif ($file_extention = "image/jpg") {
                $newimgextention = ".jpg";
            } elseif ($file_extention = "image/png") {
                $newimgextention = ".png";
            } elseif ($file_extention = "image/svg") {
                $newimgextention = ".svg";
            }
            $filename = "resources//profile_img//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $filename);
            $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["ao"]["email"] . "'  ");
            $pror = $resultProfileImg->num_rows;

            if ($pror == 1) {


                Database::iud("UPDATE `profile_img` SET `code`='" . $filename . "' WHERE `user_email`='" . $_SESSION["ao"]["email"] . "'  ");

                echo " || Image Updated Successfully.";
            } else {
                Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES ('" . $filename . "','" . $last_email . "') ");
                echo " || Image Saved Successfully.";
            }
            // }
        }
    }
} else {
    echo "invalid User";
}
