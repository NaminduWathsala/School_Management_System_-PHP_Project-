<?php
session_start();

require "connection.php";

if (isset($_SESSION["s"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $fullname = $_POST["fn"];
    $phone = $_POST["p"];
    $mobile = $_POST["m"];
    $dob = $_POST["dob"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $province = $_POST["pro"];

    $pfn = $_POST["pfn"];
    $pln = $_POST["pln"];
    $pemail = $_POST["pemail"];
    $pbod = $_POST["pbod"];
    $pmn = $_POST["pmn"];
    $pml = $_POST["pml"];
    $pgen = $_POST["pgen"];

    // echo $pbod;
    // echo $lname;
    // echo $fullname;
    // echo $mobile;
    // echo $phone;
    // echo $dob;
    // echo $line1;
    // echo $line2;
    // echo $city;
    // echo $province;

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
    } else if (empty($pfn)) {
        echo "Please Enter Your Parent First Name";
    } else if (empty($pln)) {
        echo "Please Enter Your Parent Last Name";
    } else if (empty($pemail)) {
        echo "Please Enter Your Parent Email";
    } else if (empty($pbod)) {
        echo "Please Enter Your Parent Birthday";
    } else if (empty($pmn)) {
        echo "Please Enter Your parent Mobile Number";
    } else if (strlen($pmn) != 10) {
        echo "Please enter 10 digit parent mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $phone) == 0) {
        echo "Invalid parent mobile number";
    } else if ($pgen == "0") {
        echo "Please select Your parent Gender";
    } else {


        $saddressrs = Database::search("SELECT * FROM `Student` WHERE `parent_id` = '1' AND `email`= '" . $_SESSION["s"]["email"] . "' ");
        $n = $saddressrs->num_rows;

        if ($n == 1) {
            Database::iud("INSERT INTO `parent`(`fname`, `lname`, `email`, `dob`, `mobile`, `phone`, `gender_id`)
            VALUES ('" . $pfn . "','" . $pln . "','" . $pemail . "','" . $pbod . "','" . $pml . "','" . $pmn . "','" . $pgen . "')");

            $parentse = Database::search("SELECT * FROM `parent` WHERE `email`='" . $pemail . "' AND `fname`='" . $pfn . "' ");
            $pase = $parentse->num_rows;

            if ($pase == 1) {
                $ps = $parentse->fetch_assoc();
                //update

                Database::iud("UPDATE `Student` SET `parent_id`= '" . $ps["id"] . "' WHERE `email`='" . $_SESSION["s"]["email"] . "' ");

                echo "Student Parent Details Added || ";
            }
        } else {
            $sp = $saddressrs->fetch_assoc();

            Database::iud("UPDATE `parent` SET `fname`='" . $pfn . "',`lname`='" . $pln . "',
        `email`='" . $pemail . "',`dob`='" . $pbod . "',`mobile`='" . $pml . "',
        `phone`='" . $pmn . "',`gender_id`='" . $pgen . "' WHERE `id` = '" . $sp["parent_id"] . "'");

            echo "Student Parent Details Updated || ";
        }




        // ///////////


        Database::iud("INSERT INTO `address`( `line1`, `line2`, `city_id`, `provinces_id`) VALUES ('" . $line1 . "','" . $line2 . "','" . $city . "','" . $province . "')");

        $addressrs = Database::search("SELECT * FROM `address` WHERE `line1`='" . $line1 . "' AND `line2`='" . $line2 . "' AND `city_id`='" . $city . "' AND `provinces_id`='" . $province . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            $add = $addressrs->fetch_assoc();
            //update

            Database::iud("UPDATE `Student` SET `fname`='" . $fname . "',`lname`='" . $lname . "',
            `full_name`='" . $fullname . "',`dob`='" . $dob . "',`phone`='" . $phone . "',
            `mobile`='" . $mobile . "',`address_id`='" . $add["id"] . "'
             WHERE `email`='" . $_SESSION["s"]["email"] . "' ");

            echo "Student profile updated || Student Address updated ";
        } else {
            Database::iud("UPDATE `Student` SET `fname`='" . $fname . "',`lname`='" . $lname . "',
            `full_name`='" . $fullname . "',`dob`='" . $dob . "',`phone`='" . $phone . "',
            `mobile`='" . $mobile . "' WHERE `email`='" . $_SESSION["s"]["email"] . "' ");

            echo "Student profile updated";
        }

        $last_email = $_SESSION["s"]["email"];

        if (isset($_FILES["i"])) {
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
                $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["s"]["email"] . "'  ");
                $pror = $resultProfileImg->num_rows;

                if ($pror == 1) {


                    Database::iud("UPDATE `profile_img` SET `code`='" . $filename . "' WHERE `user_email`='" . $_SESSION["s"]["email"] . "'  ");

                    echo " || Image Updated Successfully.";
                } else {
                    Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES ('" . $filename . "','" . $last_email . "') ");
                    echo " || Image Saved Successfully.";
                }
            }
        }
    }
} else {
    echo "invalid User";
}
