<?php
session_start();

require "connection.php";

$e = $_POST["email"];
$p = $_POST["password"];
$r = $_POST["remember"];
$v = $_POST["vc"];

if (empty($v)) {
    echo "Please Enter the Verification Code";
}

$rs = Database::search("SELECT * FROM `teacher` WHERE `email` = '" . $e . "' AND `password` = '" . $p . "' AND `unique_code` = '" . $v . "' ;");
$n = $rs->num_rows;

if ($n == 1) {

    Database::iud("UPDATE `teacher` SET `status_id`='1' WHERE  `email` = '" . $e . "'");

    echo "Success";
    $d = $rs->fetch_assoc();
    $_SESSION["t"] = $d;

    if ($r == "true") {
        setcookie("e", $e, time() + (60 * 60 * 24 * 365));
        setcookie("p", $p, time() + (60 * 60 * 24 * 365));
    } else {
        setcookie("e", "", -1);
        setcookie("p", "", -1);
    }
} else {
    echo "Invalide details";
}
