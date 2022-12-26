<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {




    if (isset($_FILES["i"])) {
        $image = $_FILES["i"];
    } else {
    }
    // validate


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

            $filename = "" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $filename);
            $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");
            $pror = $resultProfileImg->num_rows;

            if ($pror == 1) {


                Database::iud("UPDATE `profile_img` SET `code`='" . $filename . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");

                echo " || Image Saved Successfully.";
            } else {
                Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES ('" . $filename . "','" . $_SESSION["u"]["email"] . "') ");
            }
        }
    }
} else {
    echo "invalid User";
}
