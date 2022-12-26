<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fn = $_POST["fn"];
    $ln = $_POST["ln"];
    $nic = $_POST["nic"];

    if (isset($_FILES["img"])) {
        $imgefile = $_FILES["img"];
    }

    // validate
    if (empty($fn)) {
        echo "Please Enter Your First Name";
    } elseif (empty($ln)) {
        echo "Please Enter Your Last Name";
    } else  if (empty($nic)) {
        echo "Please enter the NIC Number";
    } else {

        $last_email = $_SESSION["u"]["email"];


        Database::iud("UPDATE `admin` SET `fname`='" . $fn . "' , `lname`='" . $ln . "' , `NIC`='" . $nic . "'
     WHERE `email`='" . $last_email . "' ");

        echo "Admin Profile Updated successfully ";

        $allowed_image_extension = array("image/jpeg", "image/jpg", "image/png", "image/svg");

        if (isset($_FILES["img"])) {
            $image = $_FILES["img"];
        }

        if (isset($image)) {
            $file_extension = $image["type"];

            if (!in_array($file_extension, $allowed_image_extension)) {
                echo "Please select a valid image.";
            } else {

                $fileName = "resources/profile_img/" . uniqid() . $image["name"];
                move_uploaded_file($image["tmp_name"], $fileName);

                $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $last_email . "'  ");
                $pror = $resultProfileImg->num_rows;

                if ($pror == 1) {


                    Database::iud("UPDATE `profile_img` SET `code`='" . $fileName . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");

                    echo " || Image Saved Successfully.";
                } else {
                    Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES ('" . $fileName . "','" . $last_email . "') ");
                }
            }
        } else {
            echo "Please select an image";
        }
    }
} else {
    echo "invalid User";
}
