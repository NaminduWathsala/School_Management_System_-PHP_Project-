<?php

require "connection.php";


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$fulln = $_POST["fulln"];
$nic = $_POST["nic"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$doj = $_POST["doj"];
$mn = $_POST["mn"];
$ml = $_POST["ml"];
$gender = $_POST["gender"];
$quli = $_POST["quli"];
$grade = $_POST["grade"];
$sub = $_POST["sub"];

// echo $fn;
// // echo $ln;
// // echo $fulln;
// // echo $nic;
// // echo $email;
// // echo $dob;
// // echo $doj;
// // echo $mn;
// // echo $ml;
// // echo $gender;
// // echo $quli;
// // echo $grade;
// // echo $sub;


$code = uniqid();
$pa1 = "MSC";
$pa2 = "@Teacher";
$password = $pa1 . $fn . uniqid() . $pa2;

// echo $code;
// echo $password;


$status = 2;
$address = 1;
$useremail = "namiduwathsala@gmail.com";


if (empty($fn)) {
    echo "Please enter the first name";
} else if (empty($ln)) {
    echo "Please enter the last name";
} else if (empty($fulln)) {
    echo "Please enter the Full name";
} else if (empty($nic)) {
    echo "Please enter the NIC Number";
} else if (empty($email)) {
    echo "Please enter the email";
} else if (empty($dob)) {
    echo "Please enter the Birthday";
} else if (empty($doj)) {
    echo "Please enter the Join date";
} else if ($gender == "0") {
    echo "Please select the gender";
} else if (empty($mn)) {
    echo "Please enter the Mobile Number";
} else if (strlen($mn) != 10) {
    echo "Please enter 10 digit mobile number";
} else if (empty($quli)) {
    echo "Please enter the Qulifications";
} else if ($grade == "0") {
    echo "Please enter the grade";
} else if ($sub == "0") {
    echo "Please enter the subject";
} else {

    $emailcheck = Database::search("SELECT `email` FROM `teacher` WHERE `email`='" . $email . "'");

    if ($emailcheck->num_rows == 1) {
        echo "This Email already exists";
    } else {

        // email code

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'namiduwathsala@gmail.com';
        $mail->Password = 'uflocegtegzfacrb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('namiduwathsala@gmail.com', 'MSC');
        $mail->addReplyTo('namiduwathsala@gmail.com', 'MSC');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Maris Stella Collage Teacher Verification Code';
        $bodyContent = '<h1 style="color:red;">Your Teacher registration Verification Code : ' . $code . '</h1><br/>
        <h1 style="color:Green;">Your Teacher registration Username : ' . $email . '</h1><br/>
        <h1 style="color:blue;">Your Teacher registration Password : ' . $password . '</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending fail';
        } else {

            Database::iud("INSERT INTO `teacher_qualifications`(`name`) VALUES ('" . $quli . "')");

            $last_id = Database::$connection->insert_id;


            Database::iud("INSERT INTO `teacher`(`fname`, `lname`, `full_name`, `dob`, `phone`, `mobile`, `gender_id`, 
            `status_id`, `address_id`, `teacher_qualifications_id`, `unique_code`, `date_of_join`, `email`,
             `password`, `teachers_grade_id`, `nic`) VALUES ( '" . $fn . "','" . $ln . "','" . $fulln . "','" . $dob . "'
             ,'" . $mn . "','" . $ml . "','" . $gender . "','" . $status . "','" . $address . "','" . $last_id . "','" . $code . "','" . $doj . "','" . $email . "',
             '" . $password . "','" . $grade . "','" . $nic . "')");

            $subid = Database::search("SELECT `id` FROM `teacher` WHERE `email`='" . $email . "'");
            $n3 = $subid->num_rows;
            $sid = $subid->fetch_assoc();
            Database::iud("INSERT INTO `teacher_has_subject`(`teacher_id`, `teachers_subject_id`) VALUES ('" . $sid["id"] . "','" . $sub . "')");


            echo 'Success';
        }

        // email



    }
}
