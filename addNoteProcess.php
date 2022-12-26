<?php
require "connection.php";
session_start();
$n = $_POST["n"];


if (isset($_FILES["f"])) {

    $filename = $_FILES['f']['name'];

    $destination = 'resources//notes//' . uniqid() . $filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['f']['tmp_name'];
    $size = $_FILES['f']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['f']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            Database::iud("INSERT INTO `notes`( `name`, `code`, `teacher_id`) VALUES ('" . $n . "','" . $destination . "','" . $_SESSION["t"]["id"] . "')");

            echo "File uploaded successfully";
        } else {
            echo "Failed to upload file.";
        }
    }
}
