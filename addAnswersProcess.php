<?php
require "connection.php";
$a = $_POST["a"];
$m = $_POST["m"];

$status = 2;
if (empty($m)) {
    echo "Please enter the Mark";
} else if ($m >= 100) {
    echo "Invalid Mark";
} else {

    $exams =  Database::search("SELECT * FROM `exam_results` WHERE `answer_id`='" . $a . "'");

    $es = $exams->num_rows;

    if ($es == 1) {

        Database::iud("UPDATE `exam_results` SET `marks`='" . $m . "' WHERE `answer_id`='" . $a . "'");
        echo "mark updated Succesfully";
    } else {
        Database::iud("INSERT INTO `exam_results`(`marks`, `answer_id`, `status_id`) VALUES ('" . $m . "','" . $a . "','" . $status . "') ");
        echo "mark added Succesfully";
    }
}
